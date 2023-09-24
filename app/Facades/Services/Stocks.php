<?php

namespace App\Facades\Services;

use App\Services\Stocks as ServicesStocks;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array getTickerPrice(string $ticker)
 * @method static array getCompanyProvents(string $ticker)
 * @method static array getHistoricalPrice(string $ticker)
 * @method static array searchTicker(string $search)
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