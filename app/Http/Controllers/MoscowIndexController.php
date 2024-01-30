<?php

namespace App\Http\Controllers;

use App\Models\MoscowIndex;

class MoscowIndexController extends Controller
{
    public function store(array $array)
    {
        MoscowIndex::insertOrIgnore($array);
    }
}
