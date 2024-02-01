<?php

namespace App\Helpers\Api;

use App\Repositories\ApiKeyRepository;
use function config;

abstract class ApiData
{
    protected string $siteUrl = '';
    protected string $apiKey = '';

    public function __construct()
    {
        $this->setUrl();
        $this->setApiKey();
    }

    private function setUrl()
    {
        $className = basename(get_class($this));
        $getType = strtolower(substr($className, -5));
        $currentClassName = strtolower(substr($className, 0, -5));
        $parentClassName = strtolower(substr(basename(get_parent_class($this)), 0, -4));

        $this->siteUrl = config('apikeys.'. $getType . '.' . $parentClassName . '.' . $currentClassName . '.site_url');
    }

    private function setApiKey()
    {
        $apiKeyRepository = new ApiKeyRepository();
        $this->apiKey = $apiKeyRepository->getApiKeyByUrl($this->siteUrl);
    }



}
