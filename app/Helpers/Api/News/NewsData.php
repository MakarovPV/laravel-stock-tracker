<?php

namespace App\Helpers\Api\News;

use App\Helpers\Api\ApiData;

abstract class NewsData extends ApiData
{
    protected function setUrl(): void
    {
        $className = basename(get_class($this));
        $getType = strtolower(substr(substr($className, -9), 0, -4));
        $currentClassName = strtolower(substr($className, 0, -9));
        $parentClassName = strtolower(substr(basename(get_parent_class($this)), 0, -4));

        $this->siteUrl = config('apikeys.'. $getType . '.' . $parentClassName . '.' . $currentClassName . '.site_url');
    }
}
