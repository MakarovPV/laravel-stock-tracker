<?php

namespace App\Console\Commands\Moscow\News;

use App\Helpers\Api\News\Stock\Moscow\ImoexStockNews;
use App\Http\Controllers\MoscowNewsController;
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
    protected $description = 'Command description';

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
