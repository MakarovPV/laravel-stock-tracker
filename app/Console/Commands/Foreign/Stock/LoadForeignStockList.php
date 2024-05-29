<?php

namespace App\Console\Commands\Foreign\Stock;

use App\Http\Controllers\ForeignStockController;
use App\Services\Stocks\Stock\Foreign\FinancialmodelingprepStock;
use Illuminate\Console\Command;

class LoadForeignStockList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:foreign_stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загрузка списка зарубежных акций';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ForeignStockController $foreignStockController, FinancialmodelingprepStock $financialmodelingprepStock)
    {
        $foreignStockController->store($financialmodelingprepStock->getStockList());

        echo 'Список зарубежных акций загружен.' . PHP_EOL;
    }
}
