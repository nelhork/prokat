<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPriceListRequest;
use App\Http\Requests\StorePricelist;
use App\Models\PriceList;
use App\Models\ProkatModel;
use Illuminate\Http\Request;
use function Psy\debug;

class PriceListController extends BaseController
{
    //    public function index(StorePricelist $request)
    //    {
    ////        $begin = new \DateTime($request->query->get('begin'));
    ////        $end = new \DateTime($request->query->get('end'));
    ////        $diff = $begin->diff($end);
    ////
    ////        $priceLists = PriceList::where('model_id', $request->get('model_id'))
    ////            ->whereRaw('? between period_min and period_max', [$diff->days])->get();
    ////
    ////        return $this->sendResponse(false, 'pricelists', $priceLists);
    //
    //        $pricelists = PriceList::all();
    //        return view('pricelists.index', compact('pricelists'));
    //    }

    public function index(ProkatModel $model)
    {
        $pricelists = $model['priceLists'];

        return view('pricelists.index', [
            'model' => $model,
            'pricelists' => $pricelists,
        ]);
    }

    public function showForPeriod(ProkatModel $model, Request $request)
    {
        $period = $request['period'];
        return $model->priceLists()
            ->where('period_min', '<=', $period)
            ->where('period_max', '>=', $period)
            ->firstOrFail();
    }

    public function create(ProkatModel $model)
    {
        $pricelist = new PriceList(['model_id' => $model['id']]);
        $pricelist->setRelation('model', $model);

        return view('pricelists.create', [
            'pricelist' => $pricelist,
            'model' => $model,
        ]);
    }

    public function store(StorePricelist $request)
    {
        PriceList::create([
            'price_for_period' => $request['price_for_period'],
            'deposit_for_period' => $request['deposit_for_period'],
            'full_price_for_period' => $request['full_price_for_period'],
            'period_min' => $request['period_min'],
            'period_max' => $request['period_max'],
            'model_id' => $request['model_id']
        ]);

        return redirect()->route('models.pricelists', ['model' => $request['model_id']]);
    }

    public function edit(ProkatModel $model, PriceList $pricelist)
    {
        return view('pricelists.edit', [
            'model' => $model,
            'pricelist' => $pricelist
        ]);
    }

    public function update(ProkatModel $model, PriceList $pricelist, StorePricelist $request)
    {
        $pricelist['price_for_period'] = $request['price_for_period'];
        $pricelist['deposit_for_period'] = $request['deposit_for_period'];
        $pricelist['full_price_for_period'] = $request['full_price_for_period'];
        $pricelist['period_min'] = $request['period_min'];
        $pricelist['period_max'] = $request['period_max'];
        $pricelist['model_id'] = $model['id'];

        $pricelist->save();

        return redirect()->route('models.pricelists', ['model' => $model['id']]);
    }

    public function destroy(ProkatModel $model, PriceList $pricelist)
    {
        $pricelist->delete();

        return redirect()->route('models.pricelists', ['model' => $model['id']]);
    }
}
