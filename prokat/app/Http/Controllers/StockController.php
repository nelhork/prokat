<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStock;
use App\Models\Stock;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class StockController extends BaseController
{
    public function index()
    {
        return view('stocks.index', ['stocks' => Stock::paginate()]);
    }

    public function create()
    {
        return view('stocks.create', ['stock' => new Stock()]);
    }

    public function store(StoreStock $request)
    {
        Stock::create( ['address' => $request['address'], 'name' => $request['name'], 'comment' => $request['comment']]);

        return redirect()->route('stocks.index');
    }

    public function edit(Stock $stock)
    {
        return view('stocks.edit', ['stock' => $stock]);
    }

    public function update(Stock $stock, StoreStock $request)
    {
        $stock['address'] = $request['address'];
        $stock['name'] = $request['name'];
        $stock['comment'] = $request['comment'];

        $stock->save();

        return redirect()->route('stocks.index');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->route('stocks.index');
    }
}
