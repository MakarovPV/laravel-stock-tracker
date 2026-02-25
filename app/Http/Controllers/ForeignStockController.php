<?php

namespace App\Http\Controllers;

use App\Actions\ForeignGetStockInfoAction;
use App\Actions\StockListIndexAction;
use App\Models\ForeignStock;
use Illuminate\Http\Request;

class ForeignStockController extends Controller
{
    private ForeignStock $model;

    public function __construct(ForeignStock $model)
    {
        $this->model = $model;
    }

    /**
     * Получение и вывод списка зарубежных акций на страницу по сектору.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request, StockListIndexAction $action)
    {
        $stocks = $action($request->input(), $this->model);
        $sectors = ForeignStock::getSectors();

        return view('stocks.foreign.index', compact('stocks', 'sectors'));
    }

    /**
     * Вывод информации по конкретной акции.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id, ForeignGetStockInfoAction $action)
    {
        $info = $action($id);

        return view('stocks.foreign.show', compact('info'));
    }
}
