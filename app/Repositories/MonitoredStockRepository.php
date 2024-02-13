<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class MonitoredStockRepository extends Repository
{
    /**
     * Получение списка отслеживаемых пользователем активов по категории (акции/криптовалюта и т.д.).
     *
     * @param string $stock_exchange
     * @return mixed
     */
    public function getStockListByCategory(string $stock_exchange): mixed
    {
        return $this->model->where('stock_exchange', $stock_exchange)->where('user_id', Auth::id())->get();
    }
}
