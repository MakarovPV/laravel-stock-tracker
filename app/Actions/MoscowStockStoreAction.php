<?php

namespace App\Actions;

use App\DTO\MoscowStockDTO;
use App\Models\MoscowStock;

class MoscowStockStoreAction
{
    public function __invoke(MoscowStockDTO $dto)
    {
        MoscowStock::insertOrIgnore([
            'ticker' => $dto->ticker,
            'stock_name' => $dto->stock_name
        ]);
    }
}
