<?php

namespace App\Http\Controllers;

use App\Models\MoscowNews;
use App\Repositories\MoscowNewsRepository;

class MoscowNewsController extends Controller
{
    private MoscowNewsRepository $moscowNewsRepository;

    public function __construct(MoscowNewsRepository $moscowNewsRepository)
    {
        $this->moscowNewsRepository = $moscowNewsRepository;
    }

    public function index()
    {
        $news = $this->moscowNewsRepository->getNewsWithPaginate();
        return view('news.moscow.index', compact('news'));
    }

    public function show(int $id)
    {
        $fullNews = $this->moscowNewsRepository->getFullNewsById($id);
        return view('news.moscow.show', compact('fullNews'));
    }

    public function store(array $news)
    {
        MoscowNews::insertOrIgnore($news);
    }
}
