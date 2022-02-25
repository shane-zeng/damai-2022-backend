<?php

namespace App\Services;

use App\Constants\CurrencyConstant;
use App\Repositories\CurrencyRepository;

/**
 *
 */
class ExchangeService
{
    private $currencyRepo;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepo = $currencyRepository;
    }

    public function getExchangeRate(string $from, string $to, $amount = 1)
    {
        // 來源幣別 -> 美金
        $getUSDRate = $amount / $this->currencyRepo->getExchangeRate($from)['Exrate'];

        // 取得美金與目標幣別匯率
        $getExchangeRate = $this->currencyRepo->getExchangeRate($to);

        return [

            'exchange_rate' => $getUSDRate * $getExchangeRate['Exrate'],
            'updated_at'    => $getExchangeRate['UTC'],
        ];
    }
}
