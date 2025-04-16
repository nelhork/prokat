<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Mixins\HasFiles;
use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use App\Models\ProkatModel;
use App\Models\Stock;

class ItemController extends BaseController
{
    use HasFiles;

    public function __construct()
    {
        $this->dirname = 'models';
    }

    public function index()
    {
        return view('items.index', ['items' => Item::with(['model', 'stock'])->paginate()]);
    }

    public function create()
    {
        return view('items.create', ['item' => new Item(), 'models' => ProkatModel::all(), 'stocks' => Stock::all()]);
    }

    public function store(StoreItemRequest $request)
    {
        $photo1Path = $request['photo1']->store('items', 'public');
        $photo2Path = $request['photo2']->store('items', 'public');
        $photo3Path = $request['photo3']->store('items', 'public');

        Item::create([
            'comment' => $request['comment'],
            'photo1' => basename($photo1Path),
            'photo2' => basename($photo2Path),
            'photo3' => basename($photo3Path),
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
        $this->replaceFile($request, $item, 'photo1');
        $this->replaceFile($request, $item, 'photo2');
        $this->replaceFile($request, $item, 'photo3');

        $item->update($request->except('photo1', 'photo2', 'photo3'));
        $item->save();

        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        $this->deleteFile($item['photo1']);
        $this->deleteFile($item['photo2']);
        $this->deleteFile($item['photo3']);

        $item->delete();

        return redirect()->route('items.index');
    }
}
