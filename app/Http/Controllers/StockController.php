<?php

namespace App\Http\Controllers;

use App\Actions\MonitoredStockStoreAction;
use App\DTO\MonitoredStockDTO;
use App\Http\Requests\MonitoredStockRequest;
use App\Models\MonitoredStock;

class StockController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Получение отслеживаемых пользователем активов по требуемым категориям и вывод их на страницу.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        [$stocks_moscow, $stocks_foreign, $crypto] = MonitoredStock::stockListByAllCategories(['moscow', 'foreign', 'crypto']);

        return view('index', compact(['stocks_moscow', 'stocks_foreign', 'crypto']));
    }

    /**
     * @param MonitoredStockRequest $request
     * @return void
     */
    public function store(MonitoredStockRequest $request, MonitoredStockStoreAction $action): void
    {
        $action(new MonitoredStockDTO($request->validated()));
    }
}
