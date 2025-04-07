<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatusController extends BaseController
{
    public function index(): JsonResponse
    {
        return $this->sendResponse(false, 'statuses', Status::all());
    }
}
