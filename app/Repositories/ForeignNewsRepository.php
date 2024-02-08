<?php

namespace App\Repositories;

use App\Models\ForeignNews;

class ForeignNewsRepository extends NewsRepository
{
    protected function model(): string
    {
        return ForeignNews::class;
    }
}
