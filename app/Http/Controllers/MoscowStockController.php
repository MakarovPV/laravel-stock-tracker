<?php

namespace App\Http\Controllers;

use App\Models\MoscowStock;
use Illuminate\Support\Facades\Http;

class MoscowStockController extends Controller
{
    public function getStockArrayFromApi(): array
    {
        $result = [];
        $array = Http::get("https://iss.moex.com/iss/statistics/engines/stock/markets/index/analytics/imoex.json",
            [
                'limit' => '100',
                'iss.meta' => 'off',
                'analytics.columns' => 'ticker, shortnames',
                'iss.only' => 'analytics'
            ])['analytics'];
        $array['columns'][1] = 'stock_name';

        foreach ($array['data'] as $val){
            $result[] = array_combine($array['columns'], $val);
        }

        return $result;
    }

    public function store(array $array)
    {
        MoscowStock::insertOrIgnore($array);
    }
}
