<?php

namespace App\Actions;

use App\DTO\MoscowStockIndexDTO;
use App\Models\MoscowStockIndex;

class MoscowStockIndexStoreAction
{
    public function __invoke(MoscowStockIndexDTO $dto)
    {
        MoscowStockIndex::insertOrIgnore([
            'stock_id' => $dto->stock_id,
            'index_id' => $dto->index_id
        ]);
    }
}
