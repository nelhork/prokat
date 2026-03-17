<?php

namespace App\Http\Controllers;

use App\Models\ProkatModel;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeftoverController extends Controller
{

    public function index(Request $request)
    {
        $stocks = Stock::select('id', 'name')
            ->get();

        $end = Carbon::parse($request['date']);

        $sql = <<<SQL

        select models.id, models.name, count(i.id) as current_qty, COALESCE((select count(*) from models_to_orders
                                                               inner join orders o on o.id = models_to_orders.order_id
                                                               where o.end_at between now() and :end_at
                                                               and models_to_orders.model_id = models.id), 0) as expected_qty
            from models
            left join items i on models.id = i.model_id
            where i.id is null or (i.status = 'Доступен'
                and i.stock_id = any(string_to_array(:stocks, ',')::int[]))
            group by models.id
            order by models.id
        SQL;

        $selectedStocks = $request['stocks'] ?? [];


        $models = DB::select($sql, [
            'end_at' => $end,
            'stocks' => implode(',', $selectedStocks)
        ]);

        return view('leftovers.index', ['stocks' => $stocks, 'models' => $models, 'selectedStocks' => $selectedStocks, 'date' =>  $end->isValid()  ? $end : Carbon::tomorrow()]);
    }


}
