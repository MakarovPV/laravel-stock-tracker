<?php

namespace App\Repositories;

use App\Models\MoscowIndex;

class MoscowIndexRepository extends Repository
{

    protected function model(): string
    {
        return MoscowIndex::class;
    }

    public function getIndices()
    {
        return $this->model->get();
    }

    public function getStockList(string $index)
    {
        $stocks = $this->model->where('index_name', $index)->first();
        return $stocks->stocks;
    }
}
