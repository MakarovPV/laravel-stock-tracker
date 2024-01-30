<?php

namespace App\Http\Controllers\Api\News;

use App\Helpers\Api\ApiData;
use App\Http\Controllers\Api\ApiController;

class NewsController extends ApiController
{
    public function __construct(ApiData $apiData)
    {
        parent::__construct($apiData);
    }
}
