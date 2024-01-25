<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

interface StockDataApi
{
    /** Получение данных по API
     * @param Request $request
     * @return mixed
     */
    public function getDataFromApi(Request $request) : mixed;
}
