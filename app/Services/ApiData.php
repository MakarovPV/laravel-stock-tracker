<?php

namespace App\Services;

use App\Models\ApiKey;
use App\Repositories\ApiKeyRepository;

abstract class ApiData
{
    protected string $siteUrl = '';
    protected string $apiKey = '';

    public function __construct()
    {
        $this->setUrl();
        $this->setApiKey();
    }

    /**
     * Получение и запись в переменную url для текущего класса.
     *
     * @return mixed
     */
    protected abstract function setUrl(): void;

    /**
     * Получение и запись в переменную api-ключа из конфиг-файла по url.
     *
     * @return void
     */
    private function setApiKey(): void
    {
        $this->apiKey = ApiKey::apiKeyByUrl($this->siteUrl);
    }
}
