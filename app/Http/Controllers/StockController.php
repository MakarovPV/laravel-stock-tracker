<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonitoredStockRequest;
use App\Models\MonitoredStock;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index()
    {
        $stocks_moscow = MonitoredStock::where('stock_exchange', 'moscow')->where('user_id', Auth::id())->toBase()->get();
        $stocks_foreign = MonitoredStock::where('stock_exchange', 'foreign')->where('user_id', Auth::id())->toBase()->get();
        $crypto = MonitoredStock::where('stock_exchange', 'crypto')->where('user_id', Auth::id())->toBase()->get();
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
