<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ExchangeResource;
use App\Services\ExchangeService;
use Illuminate\Http\Request;

/**
 *
 */
class QuizController extends Controller
{
    private $exchangeService;

    public function __construct(
        ExchangeService $exchangeService
    ) {
        $this->exchangeService = $exchangeService;
    }

    public function getExchangeRate(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'from' => 'required|string',
            'to'   => 'required|string',
        ]);

        if ($validator->fails()) return new ExchangeResource(collect([]));

        // TODO: 實作取得匯率
        $response = collect($this->exchangeService->getExchangeRate($request->input('from'), $request->input('to')));

        // API回傳結果
        return new ExchangeResource($response);
    }
}
