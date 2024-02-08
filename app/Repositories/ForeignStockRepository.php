<?php

namespace App\Repositories;

use App\Models\ForeignStock;
use Illuminate\Database\Eloquent\Builder;

class ForeignStockRepository extends Repository
{
    protected function model(): string
    {
        return ForeignStock::class;
    }

    public function getStockListBySector(string $sector = '', int $perPage = 25)
    {
        return $this->model->when($sector !== '' , function ($query) use ($sector) {
            $query->where('sector', $sector);
        })->simplePaginate($perPage);

    }

    public function getStockTickerById(int $id)
    {
        return $this->model->select('ticker')->where('id', $id)->pluck('ticker')->first();
    }

    public function getSectors()
    {
        return $this->model->distinct()->pluck('sector')->filter();
    }
}
