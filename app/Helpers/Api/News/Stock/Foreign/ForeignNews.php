<?php

namespace App\Helpers\Api\News\Stock\Foreign;

use App\Helpers\Api\News\NewsData;

abstract class ForeignNews extends NewsData
{
    public function __construct(string $siteUrl)
    {
        parent::__construct($siteUrl);
    }
}
