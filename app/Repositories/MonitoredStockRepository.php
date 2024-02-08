<?php

namespace App\Repositories;

use App\Models\MonitoredStock;
use Illuminate\Support\Facades\Auth;

class MonitoredStockRepository extends Repository
{
    protected function model(): string
    {
        return MonitoredStock::class;
    }

    public function getStockListBySource(string $stock_exchange)
    {
        return $this->model->where('stock_exchange', $stock_exchange)->where('user_id', Auth::id())->get();
    }

}
