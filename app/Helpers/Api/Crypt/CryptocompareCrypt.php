<?php

namespace App\Helpers\Api\Crypt;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CryptocompareCrypt extends CryptData
{
    public function getTickerDataFromApi(array $data) : mixed
    {
        $cacheKey = $data['ticker'] . '_' . $data['interval'];

        $result = Cache::remember($cacheKey, 3600, function () use ($data){
            return Http::get($this->siteUrl . "data/v2/{$data['segment']}", [
                'fsym' => $data['ticker'],
                'tsym' => 'rub',
                'aggregate' => $data['interval'],
                'limit' => $data['limit'],
            ])->throw()->json();
        });

        return $result;
    }
}
