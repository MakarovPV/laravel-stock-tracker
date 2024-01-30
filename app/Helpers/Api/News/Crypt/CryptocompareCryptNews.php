<?php

namespace App\Helpers\Api\News\Crypt;

use App\Helpers\Api\Stocks\Crypt\CryptocompareCrypt;

class CryptocompareCryptNews extends CryptNews
{
    public function __construct(CryptocompareCrypt $stockData)
    {
        parent::__construct($stockData);
    }
}
