<?php

namespace App\Http\Controllers;

use App\Models\ForeignStockInfo;

class ForeignStockInfoController extends Controller
{
    public function store(array $array)
    {
        ForeignStockInfo::insertOrIgnore($array);
    }
}
