<?php

namespace App\Helpers\Api\Stocks;

use App\Helpers\Api\ApiData;

abstract class StockData extends ApiData
{
    protected function setUrl(): void
    {
        $className = basename(get_class($this));
        $getType = strtolower(substr($className, -5));
        $currentClassName = strtolower(substr($className, 0, -5));
        $parentClassName = strtolower(substr(basename(get_parent_class($this)), 0, -4));

        $this->siteUrl = config('apikeys.'. $getType . '.' . $parentClassName . '.' . $currentClassName . '.site_url');
    }
}
