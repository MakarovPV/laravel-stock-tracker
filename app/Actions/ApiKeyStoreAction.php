<?php

namespace App\Actions;

use App\DTO\ApiKeyDTO;
use App\Models\ApiKey;

class ApiKeyStoreAction
{
    public function __invoke(ApiKeyDTO $dto)
    {
        ApiKey::insertOrIgnore([
            'site_url' => $dto->site_url,
            'api_key' => $dto->api_key,
            'requests_limit' => $dto->requests_limit,
            'limit_interval' => $dto->limit_interval
        ]);
    }
}
