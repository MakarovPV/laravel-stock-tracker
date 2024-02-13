<?php

namespace App\Repositories;

class MoscowStockRepository extends Repository
{
    /**
     * Получение списка акций по указанному индексу. В случае отсутствия первого аргумента выводит список всех акций.
     *
     * @param string $index
     * @param $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getStockListByIndex(string $index = '', $perPage = 25)
    {
        if($index === '') return $this->model->simplePaginate($perPage);
        return $this->paginate((new MoscowIndexRepository())->getStockList($index), $perPage);
    }
}
