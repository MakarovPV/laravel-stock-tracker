<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ForeignStockDataApi;
use App\Models\ForeignStock;
use Illuminate\Support\Facades\Http;

class ForeignStockController extends Controller
{
    private string $apiKey = '';

    public function __construct(ForeignStockDataApi $foreignStockDataApi)
    {
        $this->apiKey = $foreignStockDataApi->getApiKey();
    }

    public function getStockArrayFromApi(): array
    {
        $array = Http::get("https://www.alphavantage.co/query", [
            'function' => 'LISTING_STATUS',
            'apiKey' => $this->apiKey,
        ]);
        $rows = explode("\n", $array);
        $result = array_map(function ($item) {
            $array = explode(',', $item);
            if (count($array) >= 2) {
                if($array[0] == 'symbol') return ;
                return ['ticker' => $array[0], 'stock_name' => $array[1]];
            }
            return $item;
        }, $rows);

        return array_slice($result, 1);
    }

    public function store(array $array)
    {
        ForeignStock::insertOrIgnore($array);
    }
}
