<?php

namespace App\Console\Commands;

use App\Helpers\Api\Stocks\Stock\Moscow\ImoexStock;
use App\Http\Controllers\MoscowStockController;
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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImoexStock $imoexStock, MoscowStockController $moscowStockController)
    {
        foreach ($imoexStock->getIndicesListFromApi() as $index){
            $moscowStockController->store($imoexStock->getStockListFromApiByIndex($index['index_name']));
        }
        echo 'Список акций московской биржи загружен' . PHP_EOL;
    }
}
