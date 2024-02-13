<?php

namespace App\Http\Controllers;

use App\Models\ForeignNews;
use App\Repositories\ForeignNewsRepository;

class ForeignNewsController extends Controller
{
    private ForeignNewsRepository $foreignNewsRepository;

    public function __construct(ForeignNewsRepository $foreignNewsRepository)
    {
        $this->foreignNewsRepository = $foreignNewsRepository;
    }

    /**
     * Получение и вывод списка новостей зарубежного рынка на страницу.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = $this->foreignNewsRepository->getNewsWithPaginate();
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
        $fullNews = $this->foreignNewsRepository->getFullNewsById($id);
        return view('news.foreign.show', compact('fullNews'));
    }

    /**
     * @param array $array
     * @return void
     */
    public function store(array $array): void
    {
        ForeignNews::insertOrIgnore($array);
    }
}
