<?php

namespace App\Helpers\Api\News\Stock\Moscow;

use Illuminate\Support\Facades\Http;

class ImoexStockNews extends MoscowNews
{
    /**
     * Получение списка заголовков новостей рынка российских акций.
     *
     * @return array
     */
    public function getNewsList() : array
    {
        $result = [];
        $array = Http::get($this->siteUrl . "iss/sitenews.json", [
            'iss.meta' => 'off',
            'sitenews.columns' => 'id, title, published_at',
            'iss.only' => 'sitenews'
        ])['sitenews'];
        $array['columns'][] = 'body';

        foreach ($array['data'] as $val){
            $val[] = $this->getNewsBodyByTitleId($val[0]);
            $result[] = array_combine($array['columns'], $val);
        }

        return $result;
    }

    /**
     * Получение содержимого конкретной новости по id её заголовка.
     *
     * @param int $title_id
     * @return string
     */
    public function getNewsBodyByTitleId(int $title_id) : string
    {
        $result = Http::get($this->siteUrl . "iss/sitenews/{$title_id}.json", [
            'iss.meta' => 'off',
            'content.columns' => 'body',
            'iss.only' => 'content'
        ])['content']['data'][0][0];

        return trim(strip_tags($result));
    }


}
