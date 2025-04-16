<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStock;
use App\Models\Movement;
use App\Models\Stock;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class MovementController extends BaseController
{
    public function index()
    {
        return view('movements.index', ['movements' => Movement::with(['item.model', 'fromStock', 'toStock'])->paginate()]);
    }
}
