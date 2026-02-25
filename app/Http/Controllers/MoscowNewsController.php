<?php

namespace App\Http\Controllers;

use App\Models\MoscowNews;
use App\Repositories\MoscowNewsRepository;

class MoscowNewsController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Получение и вывод списка новостей по российскому рынку на страницу.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = MoscowNews::getNewsWithPaginate();
        return view('news.moscow.index', compact('news'));
    }

    /**
     * Отображение конкретной новости.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $fullNews = MoscowNews::getFullNewsById($id);
        return view('news.moscow.show', compact('fullNews'));
    }
}
