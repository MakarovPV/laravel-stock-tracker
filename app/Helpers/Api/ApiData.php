<?php

namespace App\Helpers\Api;

use function config;

abstract class ApiData
{
    protected string $siteUrl = '';

    public function __construct()
    {
        $this->setUrl();
    }

    private function setUrl()
    {
        $className = basename(get_class($this));
        $getType = strtolower(substr($className, -5));
        $currentClassName = strtolower(substr($className, 0, -5));
        $parentClassName = strtolower(substr(basename(get_parent_class($this)), 0, -4));

        $this->siteUrl = config('apikeys.'. $getType . '.' . $parentClassName . '.' . $currentClassName . '.site_url');
    }

    public function getUrl()
    {
        return $this->siteUrl;
    }
}
