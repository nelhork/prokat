<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\StoreStock;
use App\Models\Item;
use App\Models\ProkatModel;
use App\Models\Stock;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ItemController extends BaseController
{
    public function index()
    {
        return view('items.index', ['items' => Item::with(['model', 'stock'])->get()]);
    }

    public function create()
    {
        return view('items.create', ['item' => new Item(), 'models' => ProkatModel::all(), 'stocks' => Stock::all()]);
    }

    public function store(StoreItemRequest $request)
    {
        Item::create([
            'comment' => $request['comment'],
            'photo1' => $request['photo1'],
            'photo2' => $request['photo2'],
            'photo3' => $request['photo3'],
            'status' => $request['status'],
            'model_id' => $request['model_id'],
            'stock_id' => $request['stock_id']
        ]);

        return redirect()->route('items.index');
    }

    public function edit(Item $item)
    {
        return view('items.edit', ['item' => $item, 'models' => ProkatModel::all(), 'stocks' => Stock::all()]);
    }

    public function update(Item $item, StoreItemRequest $request)
    {
        $item->update($request->validated());
        $item->save();

        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');
    }
}
