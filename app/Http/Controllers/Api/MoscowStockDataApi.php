<?php

namespace App\Http\Controllers\Api;

use App\Modules\StartDateSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MoscowStockDataApi implements StockDataApi
{
    /** Получение данных по API московской биржи.
     * @param Request $request
     * @return mixed
     */
    public function getDataFromApi(Request $request) : mixed
    {
        $data = $request->query();
        $cacheKey = $data['ticker'] . '_' . $data['interval'];

        $date = (new StartDateSetting($data['segment']))->selectInterval();

        $result = Cache::remember($cacheKey, 3600, function () use ($data, $date){
            return Http::get("https://iss.moex.com/iss/engines/stock/markets/shares/securities/{$data['ticker']}/candles.json", [
                'iss.meta' => 'off',
                'interval' => $data['interval'],
                'from' => $date,
            ])->throw()->json('candles.data');
        });

        return $result;
    }
}
