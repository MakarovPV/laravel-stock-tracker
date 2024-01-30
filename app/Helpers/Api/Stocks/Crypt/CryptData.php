<?php

namespace App\Helpers\Api\Stocks\Crypt;

use App\Helpers\Api\Stocks\StockData;
use App\Helpers\Api\Traits\HasApiKey;

abstract class CryptData extends StockData
{
    use HasApiKey;
}
