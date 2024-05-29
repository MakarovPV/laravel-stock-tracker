<?php

namespace App\Actions;

use App\Models\MonitoredStock;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\DataTransferObject;

class MonitoredStockStoreAction
{
    /**
     * Добавление отслеживаемого актива.
     *
     * @param array $array
     * @return void
     */
    public function __invoke(DataTransferObject $dto): void
    {
        MonitoredStock::insertOrIgnore([
            'user_id' => Auth::id(),
            'stock_name' => $dto->stock_name,
            'stock_ticker_symbol' => $dto->stock_ticker,
            'stock_exchange' => $dto->stock_category_id,
        ]);
    }
}
