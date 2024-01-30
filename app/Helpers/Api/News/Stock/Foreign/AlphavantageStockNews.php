<?php

namespace App\Helpers\Api\News\Stock\Foreign;

use App\Helpers\Api\Stocks\Stock\Foreign\AlphavantageStock;

class AlphavantageStockNews extends ForeignNews
{
    public function __construct(AlphavantageStock $stockData)
    {
        parent::__construct($stockData);
    }
}
