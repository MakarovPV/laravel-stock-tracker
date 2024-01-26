<?php

namespace App\Helpers\Api\Stock\Foreign;

use Illuminate\Support\Facades\Http;

class FinageStock extends ForeignData
{
    public function getStockListFromApi(): array
    {
        $result = [];
        $array = Http::get($this->siteUrl . "market-information/us/most-actives",
            [
                'apikey' =>  $this->apiKey,
            ])->json();

        foreach ($array as $item) {
            $result[] = ['ticker' => $item['symbol'], 'stock_name' => $item['company_name']];
        }

        return $result;
    }
}
