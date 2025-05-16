<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpendingCategory;
use App\Models\SpendingCategory;
use Illuminate\Http\Request;

class SpendingCategoryController extends Controller
{
    public function index()
    {
        return view('spending-categories.index', ['categories' => SpendingCategory::paginate()]);
    }

    public function create()
    {
        return view('spending-categories.create', ['category' => new SpendingCategory()]);
    }

    public function store(StoreSpendingCategory $request)
    {
        SpendingCategory::create( ['name' => $request['name']]);

        return redirect()->route('spending-categories.index');
    }

    public function edit(SpendingCategory $category)
    {
        return view('spending-categories.edit', ['category' => $category]);
    }

    public function update(SpendingCategory $category, StoreSpendingCategory $request)
    {
        $category['name'] = $request['name'];

        $category->save();

        return redirect()->route('spending-categories.index');
    }

    public function destroy(SpendingCategory $category)
    {
        $category->delete();

        return redirect()->route('spending-categories.index');
    }
}
