<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonitoredStockRequest;
use App\Models\MonitoredStock;
use App\Repositories\MonitoredStockRepository;
use Illuminate\Support\Facades\Auth;

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
    public function store(MonitoredStockRequest $request): void
    {
        $data = $request->input();

        MonitoredStock::insertOrIgnore([
            'user_id' => Auth::id(),
            'stock_name' => $data['stock_name'],
            'stock_ticker_symbol' => $data['stock_ticker'],
            'stock_exchange' => $data['stock_category_id']
        ]);
    }
}
