<?php

namespace App\Actions;

use App\DTO\MoscowIndexDTO;
use App\Models\MoscowIndex;

class MoscowIndexStoreAction
{
    public function __invoke(MoscowIndexDTO $dto)
    {
        MoscowIndex::insertOrIgnore([
            'index_name' => $dto->index_name,
            'short_name' => $dto->short_name
        ]);
    }
}
