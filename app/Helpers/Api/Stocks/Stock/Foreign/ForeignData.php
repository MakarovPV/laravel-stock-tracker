<?php

namespace App\Helpers\Api\Stocks\Stock\Foreign;

use App\Helpers\Api\Stocks\StockData;
use App\Helpers\Api\Traits\HasApiKey;

abstract class ForeignData extends StockData
{
    use HasApiKey;
}
