<?php

namespace App\Console\Commands;

use App\Helpers\Api\Stocks\Stock\Moscow\ImoexStock;
use App\Http\Controllers\MoscowStockIndexController;
use App\Models\MoscowIndex;
use App\Models\MoscowStock;
use Illuminate\Console\Command;

class LoadMoscowStockIndices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:moscow_stock_indices';

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
    public function handle(ImoexStock $imoexStock, MoscowStockIndexController $moscowStockIndexController)
    {
        $moscowStocks = MoscowStock::select('id', 'ticker')->pluck('id', 'ticker');
        foreach ($moscowStocks as $index => $stockId)
        {
            $indices = $imoexStock->getIndicesListForTickerFromApi($index);
            foreach ($indices as $val)
            {
                $indexId = MoscowIndex::select('id')->where('index_name', $val)->pluck('id');
                if(!isset($indexId[0])) continue;
                $moscowStockIndexController->store(['stock_id' => $stockId, 'index_id' => $indexId[0]]);
            }
        }
    }
}
