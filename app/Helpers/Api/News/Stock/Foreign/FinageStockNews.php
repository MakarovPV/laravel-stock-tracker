<?php

namespace App\Helpers\Api\News\Stock\Foreign;

use Illuminate\Support\Facades\Http;

class FinageStockNews extends ForeignNews
{
    public function __construct()
    {
        parent::__construct('https://api.finage.co.uk/');
    }

    public function getNewsByTicker(string $ticker)
    {
        $result = [];
        $array = Http::get($this->siteUrl . "news/market/{$ticker}", [
            'apikey' => $this->apiKey,
        ])['news'];

        return $result;
    }
}
