<?php

namespace App\Facades\Services;

use App\Services\Stocks as ServicesStocks;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array getTickerPrice(string $symbol)
 * @method static array getCompanyProvents(string $symbol)
 *
 * @see \App\Services\Stocks
 */
class Stocks extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ServicesStocks::class;
    }
}