<?php

namespace App\Http\Controllers;

use App\Models\ForeignStock;

class ForeignStockController extends Controller
{
    public function store(array $array)
    {
        ForeignStock::insertOrIgnore($array);
    }
}
