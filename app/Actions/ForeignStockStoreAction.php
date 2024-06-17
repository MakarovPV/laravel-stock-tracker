<?php

namespace App\Actions;

use App\DTO\ForeignStockDTO;
use App\Models\ForeignStock;

class ForeignStockStoreAction
{
    public function __invoke(ForeignStockDTO $dto)
    {
        ForeignStock::insertOrIgnore([
            'ticker' => $dto->ticker,
            'stock_name' => $dto->stock_name,
            'sector' => $dto->sector,
        ]);
    }
}
