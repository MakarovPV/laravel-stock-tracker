<?php

namespace App\Console\Commands;

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
    public function handle(MoscowStockController $moscowStockController)
    {
        $moscowStockController->store($moscowStockController->getStockArrayFromApi());
    }
}
