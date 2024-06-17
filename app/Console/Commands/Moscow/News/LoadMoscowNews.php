<?php

namespace App\Console\Commands\Moscow\News;

use App\Actions\MoscowNewsStoreAction;
use App\DTO\MoscowNewsDTO;
use App\Services\News\Stock\Moscow\ImoexStockNews;
use Illuminate\Console\Command;

class LoadMoscowNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:moscow_news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загрузка последних новостей по российским акциям';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImoexStockNews $imoexStockNews, MoscowNewsStoreAction $action)
    {
        foreach($imoexStockNews->getNewsList() as $array){
            $action(new MoscowNewsDTO($array));
        }

        echo 'Список новостей московской биржи загружен.' . PHP_EOL;
    }
}
