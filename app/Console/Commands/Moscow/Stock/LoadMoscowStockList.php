<?php

namespace App\Console\Commands\Moscow\Stock;

use App\Actions\MoscowStockStoreAction;
use App\DTO\MoscowStockDTO;
use App\Services\Stocks\Stock\Moscow\ImoexStock;
use Illuminate\Console\Command;

class LoadMoscowStockList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:moscow_stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загрузка списка российских акций';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImoexStock $imoexStock, MoscowStockStoreAction $action)
    {
        foreach ($imoexStock->getIndicesListFromApi() as $index){
            foreach($imoexStock->getStockListFromApiByIndex($index['index_name']) as $array){
                $action(new MoscowStockDTO($array));
            }
        }
        echo 'Список акций московской биржи загружен.' . PHP_EOL;
    }
}
