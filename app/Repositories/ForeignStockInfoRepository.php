<?php

namespace App\Repositories;

use App\Http\Controllers\Api\Stocks\ForeignStockCategoryController;
use App\Http\Controllers\ForeignStockInfoController;
use App\Models\ForeignStockInfo;

class ForeignStockInfoRepository extends Repository
{
    protected function model(): string
    {
        return ForeignStockInfo::class;
    }

    public function getInfo(int $id)
    {
        if($this->model->where('stock_id', $id)->exists()) return $this->model->where('stock_id', $id)->get();

        $tickerName = (new ForeignStockRepository())->getStockTickerById($id);
        $stockInfo = (new ForeignStockCategoryController())->getStockInfo($id, $tickerName);
        (new ForeignStockInfoController())->store($stockInfo);

        return $stockInfo;
    }
}
