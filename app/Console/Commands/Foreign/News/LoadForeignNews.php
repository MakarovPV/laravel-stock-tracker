<?php

namespace App\Console\Commands\Foreign\News;

use App\Http\Controllers\ForeignNewsController;
use App\Services\News\Stock\Foreign\FinancialmodelingprepStockNews;
use Illuminate\Console\Command;

class LoadForeignNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:foreign_news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загрузка последних новостей по зарубежным акциям';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ForeignNewsController $foreignNewsController, FinancialmodelingprepStockNews $financialmodelingprepStockNews)
    {
        $foreignNewsController->store($financialmodelingprepStockNews->getNewsList());
        echo 'Список новостей по иностранным активам загружен.' . PHP_EOL;
    }
}
