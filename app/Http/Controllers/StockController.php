<?php

namespace App\Http\Controllers;

use App\Actions\MonitoredStockStoreAction;
use App\DTO\MonitoredStock;
use App\Http\Requests\MonitoredStockRequest;
use App\Repositories\MonitoredStockRepository;

class StockController extends Controller
{
    private MonitoredStockRepository $monitoredStockRepository;

    public function __construct(MonitoredStockRepository $monitoredStockRepository)
    {
        $this->monitoredStockRepository = $monitoredStockRepository;
    }

    /**
     * Получение отслеживаемых пользователем активов по требуемым категориям и вывод их на страницу.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $stocks_moscow = $this->monitoredStockRepository->getStockListByCategory('moscow');
        $stocks_foreign = $this->monitoredStockRepository->getStockListByCategory('foreign');
        $crypto = $this->monitoredStockRepository->getStockListByCategory('crypto');

        return view('index', compact(['stocks_moscow', 'stocks_foreign', 'crypto']));
    }

    /**
     * @param MonitoredStockRequest $request
     * @return void
     */
    public function store(MonitoredStockRequest $request, MonitoredStockStoreAction $action): void
    {
        $action(new MonitoredStock($request->validated()));
    }
}
