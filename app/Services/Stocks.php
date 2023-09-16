<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class Stocks
{
    private $httpClient;

    protected const BASE_URL = 'https://statusinvest.com.br';

    public function __construct()
    {
        $this->httpClient = Http::baseUrl(self::BASE_URL)->withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36',
        ]);
    }

    public function getTickerPrice(string $ticker): array
    {
        $response = collect($this->httpClient->get('/acao/tickerprice', [
            'ticker' => $ticker,
            'type' => 0
        ])->json())->first();

        return (array) $response;
    }
}
