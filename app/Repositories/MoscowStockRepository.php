<?php

namespace App\Repositories;

class MoscowStockRepository extends Repository
{
    /**
     * Получение списка акций по указанному сектору. В случае отсутствия первого аргумента выводит список всех акций.
     *
     * @param string $index
     * @param $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getStockListBySector(string $index = '', $perPage = 25)
    {
        if($index === '') return $this->model->toBase()->simplePaginate($perPage);
        return $this->paginate((new MoscowIndexRepository())->getStockList($index), $perPage);
    }
}
