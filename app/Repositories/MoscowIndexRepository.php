<?php

namespace App\Repositories;


class MoscowIndexRepository extends Repository
{
    /**
     * Получение списка индексов (секторов).
     *
     * @return mixed
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function getIndices(): mixed
    {
        return $this->model->toBase()->get();
    }

    /**
     * Получение списка акций по указанному индексу.
     *
     * @param string $index
     * @return mixed
     */
    public function getStockList(string $index): mixed
    {
        $stocks = $this->model->where('index_name', $index)->first();
        return $stocks->stocks;
    }
}
