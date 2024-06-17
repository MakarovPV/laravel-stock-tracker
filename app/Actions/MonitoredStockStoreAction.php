<?php

namespace App\Actions;

use App\DTO\MonitoredStockDTO;
use App\Models\MonitoredStock;
use Illuminate\Support\Facades\Auth;

class MonitoredStockStoreAction
{
    /**
     * Добавление отслеживаемого актива.
     *
     * @param array $array
     * @return void
     */
    public function __invoke(MonitoredStockDTO $dto): void
    {
        MonitoredStock::insertOrIgnore([
            'user_id' => Auth::id(),
            'stock_name' => $dto->stock_name,
            'stock_ticker_symbol' => $dto->stock_ticker,
            'stock_exchange' => $dto->stock_category_id,
        ]);
    }
}
