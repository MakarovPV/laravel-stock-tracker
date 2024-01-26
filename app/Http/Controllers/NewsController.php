<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        $array = Http::get("https://www.alphavantage.co/query", [
            'function' => 'LISTING_STATUS',
            'apiKey' => 'GQ12XD7I4I34URYY',
        ]);
        $rows = explode("\n", $array);
        $result = array_map(function ($item) {
            $array = explode(',', $item);
            if (count($array) >= 2) {
                $item = ['ticker' => $array[0], 'stock_name' => $array[1]];
            }
            return $item;
        }, $rows);

        dd($result);
   }
}
