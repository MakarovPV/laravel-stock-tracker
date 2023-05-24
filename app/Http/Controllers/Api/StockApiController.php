<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\StartDateSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class StockApiController extends Controller
{
    //API-ключ для иностранной биржи
    private $apikey = 'GQ12XD7I4I34URYY';

    //Получение данных по API московской биржи.
    public function moscow(Request $request)
    {
        $data = $request->query();
        $cacheKey = $data['ticker'] . '_' . $data['interval'];
        $date = (new StartDateSetting($data['segment']))->selectInterval();

        $result = Cache::get($cacheKey, false);

        if(!$result){
            $result = Http::get("https://iss.moex.com/iss/engines/stock/markets/shares/securities/{$data['ticker']}/candles.json", [
                'iss.meta' => 'off',
                'interval' => $data['interval'],
                'from' => $date,
            ])->throw()->json('candles.data');

            Cache::put($cacheKey, $result, 3600);
        }
        return $result;
    }

    //Получение данных по API иностранной биржи.
    public function foreign(Request $request)
    {
        $data = $request->query();
        $cacheKey = $data['ticker'] . '_' . $data['interval'];

        $result = Cache::get($cacheKey, false);

        if(!$result){
            $result = Http::get("https://www.alphavantage.co/query", [
                'function' => "time_series_{$data['segment']}",
                'symbol' => $data['ticker'],
                'market' => 'usd',
                'interval' => $data['interval'] . 'min',
                'apikey' => $this->apikey,
            ])->throw()->json();

            Cache::put($cacheKey, $result, 3600);
        }
        return $result;
    }

    //Получение данных по API криптовалюты.
    public function cryptocurrency(Request $request)
    {
        $data = $request->query();
        $cacheKey = $data['ticker'] . '_' . $data['interval'];

        $result = Cache::get($cacheKey, false);

        if(!$result){
            $result = Http::get("https://min-api.cryptocompare.com/data/v2/{$data['segment']}", [
                'fsym' => $data['ticker'],
                'tsym' => 'rub',
                'aggregate' => $data['interval'],
                'limit' => $data['limit'],
            ])->throw()->json();

            Cache::put($cacheKey, $result, 3600);
        }
        return $result;
    }
}
