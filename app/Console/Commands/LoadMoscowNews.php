<?php

namespace App\Console\Commands;

use App\Helpers\Api\News\Stock\Moscow\ImoexStockNews;
use App\Http\Controllers\NewsTitleController;
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
    public function handle(NewsTitleController $newsTitleController, ImoexStockNews $imoexStockNews)
    {
        $newsTitleController->store($imoexStockNews->getNewsTitlesList());

        echo 'Список новостей московской биржи загружен' . PHP_EOL;
    }
}
