<?php

namespace App\Helpers\Api\Traits;

use App\Repositories\ApiKeyRepository;

trait HasApiKey
{
    protected string $apiKey = '';

    public function __construct(ApiKeyRepository $apiKeyRepository)
    {
        $this->apiKey = $apiKeyRepository->getApiKeyByUrl($this->siteUrl);
    }
}
