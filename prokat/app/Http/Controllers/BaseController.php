<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    protected function sendResponse(bool $error, string $dataKey, $data): JsonResponse
    {
        $result = [
          'error' => $error,
          $dataKey => $data
        ];

        return response()->json($result);
    }
}
