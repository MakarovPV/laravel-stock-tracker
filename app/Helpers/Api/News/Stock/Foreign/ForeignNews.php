<?php

namespace App\Helpers\Api\News\Stock\Foreign;

use App\Helpers\Api\News\NewsData;
use App\Helpers\Api\Stocks\StockData;
use App\Helpers\Api\Traits\HasApiKey;

abstract class ForeignNews extends NewsData
{
    use HasApiKey;

    public function __construct(StockData $stockData)
    {
        parent::__construct($stockData);
    }
}
