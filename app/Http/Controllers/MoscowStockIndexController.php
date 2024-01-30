<?php

namespace App\Http\Controllers;

use App\Models\MoscowStockIndex;
use Illuminate\Http\Request;

class MoscowStockIndexController extends Controller
{
    public function store(array $array)
    {
        MoscowStockIndex::insertOrIgnore($array);
    }
}
