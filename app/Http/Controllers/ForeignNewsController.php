<?php

namespace App\Http\Controllers;

use App\Models\ForeignNews;

class ForeignNewsController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Получение и вывод списка новостей зарубежного рынка на страницу.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = ForeignNews::getNewsWithPaginate();
        return view('news.foreign.index', compact('news'));
    }

    /**
     * Отображение конкретной новости.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $fullNews = ForeignNews::getFullNewsById($id);
        return view('news.foreign.show', compact('fullNews'));
    }
}
