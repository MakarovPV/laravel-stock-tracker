<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

interface StockDataApi
{
    public function getDataFromApi(Request $request) : mixed;
}
