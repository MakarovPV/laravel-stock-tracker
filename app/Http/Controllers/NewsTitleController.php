<?php

namespace App\Http\Controllers;

use App\Models\NewsTitle;

class NewsTitleController extends Controller
{
    public function store(array $newsTitles)
    {
        foreach ($newsTitles as $title){
            NewsTitle::updateOrCreate($title);
        }
    }
}
