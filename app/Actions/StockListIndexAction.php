<?php

namespace App\Actions;

use App\Repositories\Repository;

class StockListIndexAction
{
    /**
     * Получение списка акций по сектору.
     *
     * @param array $array
     * @param Repository $repository
     * @return mixed
     */
    public function __invoke(array $array, Repository $repository) : mixed
    {
        $sector = (isset($array['sector'])) ? $array['sector'] : '';

        return $repository->getStockListBySector($sector);
    }
}
