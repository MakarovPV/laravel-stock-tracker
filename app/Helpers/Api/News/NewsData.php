<?php

namespace App\Helpers\Api\News;


use App\Repositories\ApiKeyRepository;

abstract class NewsData
{
    protected string $siteUrl = '';
    protected string $apiKey = '';

    public function __construct(string $siteUrl)
    {
        $this->siteUrl = $siteUrl;
        $this->setApiKey();
    }

    private function setApiKey()
    {
        $apiKeyRepository = new ApiKeyRepository();
        $this->apiKey = $apiKeyRepository->getApiKeyByUrl($this->siteUrl);
    }
}
