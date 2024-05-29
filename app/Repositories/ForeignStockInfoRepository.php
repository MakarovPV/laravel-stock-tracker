<?php

namespace App\Repositories;

use App\Http\Controllers\Api\Stocks\ForeignStockCategoryController;
use Illuminate\Database\Eloquent\Collection;

class ForeignStockInfoRepository extends Repository
{
    /**
     * Получение всей информации по конкретной акции.
     *
     * @param int $id
     * @return array|Collection
     */
    public function getInfo(int $id): array|Collection
    {
        if($this->model->where('stock_id', $id)->exists()) return $this->model->where('stock_id', $id)->get();

        $tickerName = (new ForeignStockRepository())->getStockTickerById($id);
        $stockInfo = (new ForeignStockCategoryController())->getStockInfo($id, $tickerName);
        $this->model->insertOrIgnore($stockInfo);

        return $stockInfo;
    }
}
