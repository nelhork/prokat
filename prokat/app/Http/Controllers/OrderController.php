<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\TakeOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Item;
use App\Models\ItemStatus;
use App\Models\ModelToOrder;
use App\Models\Movement;
use App\Models\Order;
use App\Models\ProkatModel;
use App\Models\Status;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends BaseController
{
    public function index(Request $request)
    {
        $orderQuery = Order::with('models')
            ->select('orders.*', 'clients.phone1', 'clients.phone2', 'clients.phone3')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('statuses', 'orders.status_id', '=', 'statuses.id');

        if ($request->filled('models'))
        {
            $orderQuery->with('orderModels');
        }

        $filters = [
            'orders.comment' => 'comment',
            'statuses.name' => 'status',
            'orders.client_id' => 'client_id',
            'orders.begin_at' => 'begin_at',
            'orders.end_at' => 'end_at',
            'orders.total_amount' => 'total_amount',
            'orders.total_deposit' => 'total_deposit',
            'orders.giver_id' => 'giver_id',
            'orders.taker_id' => 'taker_id',
            'orders.give_stock_id' => 'give_stock_id',
            'orders.take_stock_id' => 'take_stock_id',
        ];

        foreach ($filters as $column => $input)
        {
            if ($request->filled($input))
            {
                $orderQuery->where($column, $request->input($input));
            }
        }

        if ($request->filled('phone1') || $request->filled('phone2') || $request->filled('phone3'))
        {
            $orderQuery->where(function ($query) use ($request)
            {
                if ($request->filled('phone1'))
                {
                    $query->orWhere('clients.phone1', $request->phone1);
                }
                if ($request->filled('phone2'))
                {
                    $query->orWhere('clients.phone2', $request->phone2);
                }
                if ($request->filled('phone3'))
                {
                    $query->orWhere('clients.phone3', $request->phone3);
                }
            });
        }
        $orders = $orderQuery->with(['status', 'giver', 'taker', 'giverStock', 'takerStock', 'client'])->paginate();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create', [
            'order' => new Order(),
            'statuses' => Status::all(),
            'employees' => Employee::all(),
            'stocks' => Stock::all(),
            'models' => ProkatModel::all(),
            'oldModels' => old('models', [['id' => '', 'count' => '', 'price' => '', 'deposit' => '']])
        ]);
    }

    public function store(CreateOrderRequest $request)
    {
        $client = $this->findOrCreateClient($request);

        $order = Order::create([
            'client_id' => $client['id'],
            'comment' => $request['comment'],
            'begin_at' => $request['begin_at'],
            'end_at' => $request['end_at'],
            'delivery_address_to' => $request['delivery_address_to'],
            'delivery_address_from' => $request['delivery_address_from'],
            'delivery_price' => $request['delivery_price'],
            'total_amount' => $request['total_amount'],
            'total_deposit' => $request['total_deposit'],
            'status_id' => $request['status_id'],
            'giver_id' => $request['giver_id'],
            'taker_id' => $request['taker_id'],
            'give_stock_id' => $request['give_stock_id'],
            'take_stock_id' => $request['take_stock_id'],
        ]);

        foreach ($request->input('models', []) as $modelData)
        {
            ModelToOrder::create([
                'order_id' => $order['id'],
                'model_id' => $modelData['id'],
                'count' => $modelData['count'],
                'price' => $modelData['price'],
                'deposit' => $modelData['deposit'],
            ]);
        }

        $order->save();

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан!');
    }

    public function update(Order $order, UpdateOrderRequest $request)
    {
        $order->update($request->validated());
        $order->save();

        ModelToOrder::where('order_id', $order['id'])->delete();

        foreach ($request['models'] as $model)
        {
            ModelToOrder::create(
                [
                    'model_id' => $model['id'],
                    'order_id' => $order['id'],
                    'count' => $model['count'],
                    'price' => $model['price'],
                    'deposit' => $model['deposit']
                ]
            );
        }

        return redirect()->route('orders.index');
    }

    public function edit(Order $order)
    {
        $order->load('models');
        return view('orders.edit', [
            'order' => $order,
            'statuses' => Status::all(),
            'employees' => Employee::all(),
            'stocks' => Stock::all(),
        ]);
    }

    public function view(Order $order)
    {
        $models = $order->models;
        $items = Item::where('stock_id', $order['give_stock_id'])
            ->whereIn('model_id', $models->select('id'))
            ->get();

        foreach ($models as $model)
        {
            $totalAvailable = $items->where(function (Item $item) use ($model)
            {
                return $item['model_id'] === $model['id'];

            })->count();
            $model['available'] = min($model['pivot']['count'], $totalAvailable);

        }

        $order['models'] = $models;

        return view('orders.view', [
            'order' => $order,
            'statuses' => Status::all(),
            'clients' => Client::all(),
            'employees' => Employee::all(),
            'stocks' => Stock::all(),
        ]);
    }

    public function give(Order $order)
    {
        $order['status_id'] = 2;
        $order->save();

        $modelsToOrder = ModelToOrder::where('order_id', $order['id'])->get();

        foreach ($modelsToOrder as $modelToOrder)
        {
            $items = Item::where('stock_id', $order['give_stock_id'])
                ->where('model_id', $modelToOrder['model_id'])
                ->limit($modelToOrder['count'])
                ->get();

            if ($items->count() < $modelToOrder['count'])
            {
                Log::debug('return');
                return back()->with('message', 'Недостаточно товаров на складе');
            }

            foreach ($items as $item)
            {
                $fromStock = $item['stock_id'];
                $item['stock_id'] = null;
                $item['status'] = ItemStatus::InUse;
                $item->save();

                Movement::create([
                    'comment' => "giving order #{$order['id']}",
                    'from_stock_id' => $fromStock,
                    'to_stock_id' => null,
                    'item_id' => $item['id']
                ]);
            }
        }

        return redirect()->route('orders.index');
    }

    public function take(Order $order)
    {
        $order['status_id'] = 3;
        $order->save();

        $modelsToOrder = ModelToOrder::where('order_id', $order['id'])->get();

        foreach ($modelsToOrder as $orderModel)
        {
            $items = Item::where('model_id', $orderModel['model_id'])
                ->whereNull('stock_id')
                ->limit($orderModel['count'])
                ->get();

            foreach ($items as $item)
            {
                $item['stock_id'] = $order['take_stock_id'];
                $item['status'] = ItemStatus::Available;
                $item->save();

                Movement::create([
                    'comment' => "taking order #{$order['id']}",
                    'from_stock_id' => null,
                    'to_stock_id' => $order['take_stock_id'],
                    'item_id' => $item['id']
                ]);
            }
        }

        return redirect()->route('orders.index');
    }

    private function findOrCreateClient(Request $request): Client
    {
        $client = Client::findByPhone($request['client.phone']);
        if ($client)
        {
            return $client;
        }

        return $this->createClient($request);
    }

    private function createClient(Request $request): Client
    {
        return Client::create([
            'name' => $request['client.name'],
            'phone1' => $request['client.phone'],
            'comment' => 'auto-create'
        ]);
    }
}
