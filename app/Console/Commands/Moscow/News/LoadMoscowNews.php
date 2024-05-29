<?php

namespace App\Console\Commands\Moscow\News;

use App\Http\Controllers\MoscowNewsController;
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
    public function handle(MoscowNewsController $moscowNewsController, ImoexStockNews $imoexStockNews)
    {
        $moscowNewsController->store($imoexStockNews->getNewsList());

        echo 'Список новостей московской биржи загружен.' . PHP_EOL;
    }
}
