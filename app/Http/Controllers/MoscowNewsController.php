<?php

namespace App\Http\Controllers;

use App\Models\MoscowNews;

class MoscowNewsController extends Controller
{
    public function index()
    {
        return view('news');
    }

    public function store(array $news)
    {
        MoscowNews::insertOrIgnore($news);
    }
}
