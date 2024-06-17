<?php

namespace App\Actions;

use App\DTO\MoscowNewsDTO;
use App\Models\MoscowNews;

class MoscowNewsStoreAction
{
    public function __invoke(MoscowNewsDTO $dto)
    {
        MoscowNews::insertOrIgnore([
            'id' => $dto->id,
            'title' => $dto->title,
            'published_at' => $dto->published_at,
            'body' => $dto->body,
        ]);
    }
}
