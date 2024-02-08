<?php

namespace App\Repositories;

use App\Models\MoscowStock;

class MoscowStockRepository extends Repository
{

    protected function model(): string
    {
        return MoscowStock::class;
    }

    public function getStockListByIndex(string $index = '', $perPage = 25)
    {
        if($index === '') return $this->model->simplePaginate($perPage);
        return $this->paginate((new MoscowIndexRepository())->getStockList($index), $perPage);
    }
}
