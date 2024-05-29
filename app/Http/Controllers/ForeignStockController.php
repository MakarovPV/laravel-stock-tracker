<?php

namespace App\Http\Controllers;

use App\Actions\StockListIndexAction;
use App\Models\ForeignStock;
use App\Repositories\ForeignStockInfoRepository;
use App\Repositories\ForeignStockRepository;
use Illuminate\Http\Request;

class ForeignStockController extends Controller
{
    private ForeignStockRepository $foreignStockRepository;
    private ForeignStockInfoRepository $foreignStockInfoRepository;

    public function __construct(ForeignStockRepository $foreignStockRepository, ForeignStockInfoRepository $foreignStockInfoRepository)
    {
        $this->foreignStockRepository = $foreignStockRepository;
        $this->foreignStockInfoRepository = $foreignStockInfoRepository;
    }

    /**
     * Получение и вывод списка зарубежных акций на страницу по сектору.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request, StockListIndexAction $action)
    {
        $stocks = $action($request->input(), $this->foreignStockRepository);
        $sectors = $this->foreignStockRepository->getSectors();

        return view('stocks.foreign.index', compact('stocks', 'sectors'));
    }

    /**
     * Вывод информации по конкретной акции.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $info = $this->foreignStockInfoRepository->getInfo($id);

        return view('stocks.foreign.show', compact('info'));
    }

    /**
     * @param array $array
     * @return void
     */
    public function store(array $array): void
    {
        ForeignStock::insertOrIgnore($array);
    }
}
