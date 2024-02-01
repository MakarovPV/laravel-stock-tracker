<?php

namespace App\Helpers\Api\News\Stock\Moscow;

use Illuminate\Support\Facades\Http;

class ImoexStockNews extends MoscowNews
{
    public function __construct()
    {
        parent::__construct('https://iss.moex.com/');
    }

    public function getNewsList()
    {
        $result = [];
        $array = Http::get($this->siteUrl . "iss/sitenews.json", [
            'iss.meta' => 'off',
            'sitenews.columns' => 'id, title, published_at',
            'iss.only' => 'sitenews'
        ])['sitenews'];
        $array['columns'][] = 'body';

        foreach ($array['data'] as $val){
            $val[] = $this->getNewsByTitleId($val[0]);
            $result[] = array_combine($array['columns'], $val);
        }

        return $result;
    }

    public function getNewsByTitleId(int $title_id)
    {
        $result = Http::get($this->siteUrl . "iss/sitenews/{$title_id}.json", [
            'iss.meta' => 'off',
            'content.columns' => 'body',
            'iss.only' => 'content'
        ])['content']['data'][0][0];

        return trim(strip_tags($result));
    }


}
