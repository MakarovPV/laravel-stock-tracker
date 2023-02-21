<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\StartDateSetting;
use Illuminate\Http\Request;

class StockApiController extends Controller
{
    //API-ключ для иностранной биржи
    private $apikey = 'GQ12XD7I4I34URYY';

    //Получение данных по API московской биржи.
    public function moscow(Request $request)
    {
        $data = $request->query();
        $date = (new StartDateSetting($data['segment']))->selectInterval();
        return json_decode(file_get_contents("https://iss.moex.com/iss/engines/stock/markets/shares/securities/{$data['ticker']}/candles.json?iss.meta=off&interval={$data['time']}&from=$date"));
    }

    //Получение данных по API иностранной биржи.
    public function foreign(Request $request)
    {
        $data = $request->query();
        if($data['interval'] == 0) {
            $interval = '60min';
        } else {
            $interval = $data['interval'] . 'min';
        }
        return json_decode(file_get_contents("https://www.alphavantage.co/query?function=time_series_{$data['segment']}&symbol={$data['ticker']}&interval=$interval&apikey=$this->apikey"));
    }
}
