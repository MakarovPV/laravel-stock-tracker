<?php

namespace App\Http\Controllers;


use App\Helpers\Api\News\Stock\Moscow\ImoexStockNews;
use App\Models\News;
use App\Models\NewsTitle;

class NewsController extends Controller
{
    public function index()
    {
        return view('news');
    }

    public function store(NewsTitle $newsTitle)
    {
        $id = NewsTitle::latest('published_at')->first()->id;
        $body = new ImoexStockNews();
        News::insertOrIgnore([
            'title_id' => $id,
            'body' => $body->getNewsByTitleId($id),
            'published_at' => $newsTitle->published_at,
        ]);
    }
}
