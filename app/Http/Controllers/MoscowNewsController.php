<?php

namespace App\Http\Controllers;

use App\Repositories\MoscowNewsRepository;

class MoscowNewsController extends Controller
{
    private MoscowNewsRepository $moscowNewsRepository;

    public function __construct(MoscowNewsRepository $moscowNewsRepository)
    {
        $this->moscowNewsRepository = $moscowNewsRepository;
    }

    /**
     * Получение и вывод списка новостей по российскому рынку на страницу.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = $this->moscowNewsRepository->getNewsWithPaginate();
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
        $fullNews = $this->moscowNewsRepository->getFullNewsById($id);
        return view('news.moscow.show', compact('fullNews'));
    }
}
