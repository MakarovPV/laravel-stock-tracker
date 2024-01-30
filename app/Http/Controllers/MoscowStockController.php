<?php

namespace App\Http\Controllers;

use App\Models\MoscowStock;

class MoscowStockController extends Controller
{
    public function store(array $array)
    {
        MoscowStock::insertOrIgnore($array);
    }
}
