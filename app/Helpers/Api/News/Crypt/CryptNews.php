<?php

namespace App\Helpers\Api\News\Crypt;

use App\Helpers\Api\News\NewsData;
use App\Helpers\Api\Stocks\StockData;
use App\Helpers\Api\Traits\HasApiKey;

abstract class CryptNews extends NewsData
{
    use HasApiKey;

    public function __construct(StockData $stockData)
    {
        parent::__construct($stockData);
    }
}
