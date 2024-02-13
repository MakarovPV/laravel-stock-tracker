<?php

namespace App\Helpers\Api\News\Stock\Foreign;

use Illuminate\Support\Facades\Http;

class FinancialmodelingprepStockNews extends ForeignNews
{
    /**
     * Получение списка новостей рынка зарубежных акций.
     *
     * @return array
     */
    public function getNewsList(): array
    {
        $result = [];
        $array = Http::get($this->siteUrl . "api/v3/fmp/articles", [
            'page' => '0',
            'size' => '50',
            'apikey' => $this->apiKey,
        ])['content'];
        $keys = ['title', 'published_at', 'body'];
        foreach ($array as $val)
        {
            $val = array_slice($val, 0 ,3);
            $result[] = array_combine($keys, $val);
        }

        return $result;
    }
}
