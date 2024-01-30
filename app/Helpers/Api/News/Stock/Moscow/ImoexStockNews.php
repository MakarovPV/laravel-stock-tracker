<?php

namespace App\Helpers\Api\News\Stock\Moscow;

use Illuminate\Support\Facades\Http;

class ImoexStockNews extends MoscowNews
{
    public function __construct()
    {
        parent::__construct('https://iss.moex.com/');
    }

    public function getNewsTitlesList()
    {
        $result = [];
        $array = Http::get($this->siteUrl . "iss/sitenews.json", [
                'iss.meta' => 'off',
                'sitenews.columns' => 'id, title, published_at',
                'iss.only' => 'sitenews'
            ])['sitenews'];

        foreach ($array['data'] as $val){
            $result[] = array_combine($array['columns'], $val);
        }

        return array_reverse($result);
    }

    public function getNewsByTitleId(int $title_id)
    {
        $result = Http::get($this->siteUrl . "iss/sitenews/{$title_id}.json", [
            'iss.meta' => 'off',
            'content.columns' => 'body',
            'iss.only' => 'content'
        ])['content']['data'][0][0];

        return $result;
    }
}
