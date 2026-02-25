<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;

class StockListIndexAction
{
    /**
     * Получение списка акций по сектору.
     *
     * @param array $array
     * @param Repository $repository
     * @return mixed
     */
    public function __invoke(array $array, Model $model) : mixed
    {
        $sector = (isset($array['sector'])) ? $array['sector'] : '';

        return $model->getStockListBySector($sector);
    }
}
