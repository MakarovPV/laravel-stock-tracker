<?php

namespace App\Services\News;

use App\Services\ApiData;
use function config;

abstract class NewsData extends ApiData
{
    protected function setUrl(): void
    {
        $className = basename(get_class($this));

        $getType = strtolower(substr(substr($className, -9), 0, -4));
        $currentClassName = strtolower(basename(str_replace('\\', '/', substr($className, 0, -9))));
        $parentClassName = strtolower(basename(str_replace('\\', '/', substr(basename(get_parent_class($this)), 0, -4))));

        $this->siteUrl = config('apikeys.'. $getType . '.' . $parentClassName . '.' . $currentClassName . '.site_url');
    }
}
