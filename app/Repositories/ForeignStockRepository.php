<?php

namespace App\Repositories;

class ForeignStockRepository extends Repository
{
    /**
     * Получение списка секторов.
     *
     * @return mixed
     */
    public function getSectors(): mixed
    {
        return $this->model->distinct()->pluck('sector')->filter();
    }

    /**
     * Получение списка акций по указанному сектору. В случае отсутствия первого аргумента выводит список всех акций.
     *
     * @param string $sector
     * @param int $perPage
     * @return mixed
     */
    public function getStockListBySector(string $sector = '', int $perPage = 25): mixed
    {
        return $this->model->when($sector !== '' , function ($query) use ($sector) {
            $query->where('sector', $sector);
        })->simplePaginate($perPage);

    }

    /**
     * Получение тикера акции по указанному id.
     *
     * @param int $id
     * @return mixed
     */
    public function getStockTickerById(int $id): mixed
    {
        return $this->model->select('ticker')->where('id', $id)->pluck('ticker')->first();
    }
}
