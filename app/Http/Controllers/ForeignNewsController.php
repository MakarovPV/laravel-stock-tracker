<?php

namespace App\Http\Controllers;

use App\Models\ForeignNews;
use Illuminate\Http\Request;

class ForeignNewsController extends Controller
{
    public function store(array $array)
    {
        ForeignNews::insertOrIgnore($array);
    }
}
