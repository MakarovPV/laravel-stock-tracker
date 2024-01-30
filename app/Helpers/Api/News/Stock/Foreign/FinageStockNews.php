<?php

namespace App\Helpers\Api\News\Stock\Foreign;

use App\Helpers\Api\Stocks\Stock\Foreign\FinageStock;

class FinageStockNews extends ForeignNews
{
    public function __construct(FinageStock $stockData)
    {
        parent::__construct($stockData);
    }
}
