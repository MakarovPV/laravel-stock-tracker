<?php

namespace App\Helpers\Api\News\Stock\Foreign;

class FinageStockNews extends ForeignNews
{
    public function __construct(string $siteUrl)
    {
        parent::__construct($siteUrl);
    }
}
