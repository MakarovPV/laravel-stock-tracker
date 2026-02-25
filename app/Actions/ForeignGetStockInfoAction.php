<?php

namespace App\Actions;

use App\Models\ForeignStock;
use App\Models\ForeignStockInfo;
use App\Services\Stocks\Stock\Foreign\FinancialmodelingprepStock;
use Illuminate\Database\Eloquent\Collection;

class ForeignGetStockInfoAction
{
    /**
     * Получение полной информации по конкретной акции.
     *
     * @param int $id
     * @return Collection|array
     */
    public function __invoke(int $id): Collection|array
    {
        $info = ForeignStockInfo::getInfo($id);

        if(!$info){
            $tickerName = ForeignStock::getStockTickerById($id);
            $stockInfo = (new FinancialmodelingprepStock())->getStockInfoByTicker($id, $tickerName);
            ForeignStockInfo::insertOrIgnore($stockInfo);

            return $stockInfo;
        }

        return $info;
    }
}
