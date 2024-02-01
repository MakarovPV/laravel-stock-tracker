<?php

namespace App\Helpers\Api\News\Crypt;

use App\Helpers\Api\News\NewsData;

abstract class CryptNews extends NewsData
{
    public function __construct(string $siteUrl)
    {
        parent::__construct($siteUrl);
    }
}
