<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ApiKeyDTO extends DataTransferObject
{
    public string $site_url;
    public string $api_key;
    public int $requests_limit;
    public string $limit_interval;
}
