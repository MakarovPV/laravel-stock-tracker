<?php

namespace App\Repositories;

use App\Http\Controllers\Api\Stocks\ForeignStockCategoryController;

class ForeignStockInfoRepository extends Repository
{
    /**
     * Получение всей информации по конкретной акции.
     *
     * @param int $id
     * @return array
     */
    public function getInfo(int $id): array
    {
        if($this->model->where('stock_id', $id)->exists()) return $this->model->where('stock_id', $id)->get();

        $tickerName = (new ForeignStockRepository())->getStockTickerById($id);
        $stockInfo = (new ForeignStockCategoryController())->getStockInfo($id, $tickerName);
        $this->model->insertOrIgnore($stockInfo);

        return $stockInfo;
    }
}
