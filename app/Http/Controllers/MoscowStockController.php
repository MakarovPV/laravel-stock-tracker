<?php

namespace App\Http\Controllers;

use App\Actions\StockListIndexAction;
use App\Models\MoscowIndex;
use App\Models\MoscowStock;
use Illuminate\Http\Request;

class MoscowStockController extends Controller
{
    private MoscowStock $model;

    public function __construct(MoscowStock $model)
    {
        $this->model = $model;
    }

    /**
     * Получение и вывод списка российских акций на страницу по сектору.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function index(Request $request, StockListIndexAction $action)
    {
        $stocks = $action($request->input(), $this->model);
        $indices = MoscowIndex::getIndices();

        return view('stocks.moscow.index', compact('stocks', 'indices'));
    }
}
