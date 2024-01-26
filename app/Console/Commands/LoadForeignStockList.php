<?php

namespace App\Console\Commands;

use App\Helpers\Api\Stock\Foreign\FinageStock;
use App\Http\Controllers\ForeignStockController;
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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(FinageStock $finageStock, ForeignStockController $foreignStockController)
    {
        $foreignStockController->store($finageStock->getStockListFromApi());
        echo 'foreign succcess';
    }
}
