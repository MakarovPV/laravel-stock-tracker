<?php

namespace App\Repositories;

use App\Models\MoscowNews;

class MoscowNewsRepository extends NewsRepository
{
    protected function model(): string
    {
        return MoscowNews::class;
    }
}
