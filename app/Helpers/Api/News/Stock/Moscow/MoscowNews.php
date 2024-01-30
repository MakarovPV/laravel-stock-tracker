<?php

namespace App\Helpers\Api\News\Stock\Moscow;

use App\Helpers\Api\News\NewsData;

abstract class MoscowNews extends NewsData
{
    public function __construct(string $siteUrl)
    {
        parent::__construct($siteUrl);
    }
}
