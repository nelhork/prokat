<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeSource;
use App\Models\IncomeSource;
use Illuminate\Http\Request;

class IncomeSourcesController extends Controller
{
    public function index()
    {
        return view('income-sources.index', ['incomeSources' => IncomeSource::paginate()]);
    }

    public function create()
    {
        return view('income-sources.create', ['incomeSource' => new IncomeSource()]);
    }

    public function store(StoreIncomeSource $request)
    {
        IncomeSource::create( ['name' => $request['name']]);

        return redirect()->route('income-sources.index');
    }

    public function edit(IncomeSource $source)
    {
        return view('income-sources.edit', ['source' => $source]);
    }

    public function update(IncomeSource $source, StoreIncomeSource $request)
    {
        $source['name'] = $request['name'];

        $source->save();

        return redirect()->route('income-sources.index');
    }

    public function destroy(IncomeSource $source)
    {
        $source->delete();

        return redirect()->route('income-sources.index');
    }
}
