<?php

namespace App\Repositories;

use App\Models\ApiKey;

class ApiKeyRepository extends Repository
{

    protected function model(): string
    {
        return ApiKey::class;
    }

    public function getApiKeyByUrl(string $url): string
    {
        return $this->model->select('api_key')->where('site_url', $url)->pluck('api_key')->first();
    }
}
