<?php

namespace App\Actions;

use App\DTO\ForeignNewsDTO;
use App\Models\ForeignNews;

class ForeignNewsStoreAction
{
    public function __invoke(ForeignNewsDTO $dto)
    {
        ForeignNews::insertOrIgnore([
            'title' => $dto->title,
            'published_at' => $dto->published_at,
            'body' => $dto->body,
        ]);
    }
}
