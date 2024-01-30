<?php

namespace App\Helpers\Api\News;


use App\Helpers\Api\Stocks\StockData;

abstract class NewsData
{
    protected string $siteUrl = '';
    public function __construct(string $siteUrl)
    {
        $this->siteUrl = $siteUrl;
    }
}
