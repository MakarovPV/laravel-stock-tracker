<?php

namespace App\Console\Commands\Foreign\Stock;

use App\Actions\ForeignStockStoreAction;
use App\DTO\ForeignStockDTO;
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
    public function handle(FinancialmodelingprepStock $financialmodelingprepStock, ForeignStockStoreAction $action)
    {
        foreach($financialmodelingprepStock->getStockList() as $array){
            $action(new ForeignStockDTO($array));
        }

        echo 'Список зарубежных акций загружен.' . PHP_EOL;
    }
}
