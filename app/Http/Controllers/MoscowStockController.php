<?php

namespace App\Http\Controllers;

use App\Models\MoscowStock;
use App\Repositories\MoscowIndexRepository;
use App\Repositories\MoscowStockRepository;
use Illuminate\Http\Request;

class MoscowStockController extends Controller
{
    private MoscowStockRepository $moscowStockRepository;
    private MoscowIndexRepository $moscowIndexRepository;

    public function __construct(MoscowStockRepository $moscowStockRepository, MoscowIndexRepository $moscowIndexRepository)
    {
        $this->moscowStockRepository = $moscowStockRepository;
        $this->moscowIndexRepository = $moscowIndexRepository;
    }

    /**
     * Получение и вывод списка российских акций на страницу по сектору.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $sector = (isset($data['sector'])) ? $data['sector'] : '';
        $stocks = $this->moscowStockRepository->getStockListByIndex($sector);
        $indices = $this->moscowIndexRepository->getIndices();

        return view('stocks.moscow.index', compact('stocks', 'indices'));
    }

    /**
     * @param array $array
     * @return void
     */
    public function store(array $array): void
    {
        MoscowStock::insertOrIgnore($array);
    }
}
