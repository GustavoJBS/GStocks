<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Stocks
{
    private $httpClient;

    protected const BASE_URL = 'https://statusinvest.com.br';

    public function __construct()
    {
        $this->httpClient = Http::baseUrl(self::BASE_URL)
            ->withUserAgent(config('services.user-agent'));
    }

    public function getTickerPrice(string $ticker): array
    {
        $response = collect($this->httpClient->get('acao/tickerprice', [
            'ticker' => $ticker,
            'type' => 0
        ])->json())->first();

        return $response;
    }

    public function getCompanyProvents(string $ticker): array 
    {
        $response = collect($this->httpClient->get('acao/companytickerprovents', [
            'ticker' => $ticker,
            'chartProventsType' => 2
        ])->json())->toArray();

        return $response;
    }

    public function getHistoricalPrice(string $ticker): array 
    {
        $response = collect(
            $this->httpClient->post("acao/indicatorhistorical?ticker={$ticker}&time=5")->json()
        )->toArray();

        return $response;
    }

    public function searchTicker(string $search): array
    {
        $response = collect(
            $this->httpClient->post("home/mainsearchquery?q={$search}")->json()
        )->toArray();

        return $response;
    }
}
