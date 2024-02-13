<?php

namespace App\Repositories;

class ApiKeyRepository extends Repository
{
    /**
     * Получение api-ключа для указанного сайта.
     *
     * @param string $url
     * @return string
     */
    public function getApiKeyByUrl(string $url): string
    {
        return $this->model->select('api_key')->where('site_url', $url)->pluck('api_key')->first();
    }
}
