<?php

namespace App\Services\News\Stock\Foreign;

use Illuminate\Support\Facades\Http;

class FinageStockNews extends ForeignNews
{
    /**
     * Получение списка новостей по конкретной зарубежной акции.
     *
     * @param string $ticker
     * @return array
     */
    public function getNewsByTicker(string $ticker): array
    {
        $result = Http::get($this->siteUrl . "news/market/{$ticker}", [
            'apikey' => $this->apiKey,
        ])['news'];

        return $result;
    }
}
