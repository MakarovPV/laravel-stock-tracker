<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api\ApiData;

abstract class ApiController
{
    protected ApiData $apiData;
    public function __construct(ApiData $apiData){
        $this->apiData = $apiData;
    }
}
