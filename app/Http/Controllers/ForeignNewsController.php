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

    public function index()
    {
        $news = $this->foreignNewsRepository->getNewsWithPaginate();
        return view('news.foreign.index', compact('news'));
    }

    public function show(int $id)
    {
        $fullNews = $this->foreignNewsRepository->getFullNewsById($id);
        return view('news.foreign.show', compact('fullNews'));
    }

    public function store(array $array)
    {
        ForeignNews::insertOrIgnore($array);
    }
}
