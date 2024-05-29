<?php

namespace App\Services\Stocks;

use App\Services\ApiData;
use function config;

abstract class StockData extends ApiData
{
    protected function setUrl(): void
    {
        $className = basename(get_class($this));
        $getType = strtolower(substr($className, -5));
        $currentClassName =  strtolower(basename(str_replace('\\', '/', substr($className, 0, -5))));
        $parentClassName = strtolower(basename(str_replace('\\', '/', substr(basename(get_parent_class($this)), 0, -4))));

        $this->siteUrl = config('apikeys.'. $getType . '.' . $parentClassName . '.' . $currentClassName . '.site_url');
    }
}
