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

    public function index()
    {
        $stocks_moscow = $this->monitoredStockRepository->getStockListBySource('moscow');
        $stocks_foreign = $this->monitoredStockRepository->getStockListBySource('foreign');
        $crypto = $this->monitoredStockRepository->getStockListBySource('crypto');

        return view('index', compact(['stocks_moscow', 'stocks_foreign', 'crypto']));
    }

    public function store(MonitoredStockRequest $request)
    {
        $data = $request->input();

        MonitoredStock::insert([
            'user_id' => Auth::id(),
            'stock_name' => $data['stock_name'],
            'stock_ticker_symbol' => $data['stock_ticker'],
            'stock_exchange' => $data['stock_category_id']
        ]);
    }
}
