<?php

namespace App\Console\Commands\Moscow\Stock;

use App\Models\MoscowIndex;
use App\Models\MoscowStock;
use App\Models\MoscowStockIndex;
use App\Services\Stocks\Stock\Moscow\ImoexStock;
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
    protected $description = 'Заполнение промежуточной таблицы по российским акциям и индексам';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImoexStock $imoexStock)
    {
        $moscowStocks = MoscowStock::select('id', 'ticker')->pluck('id', 'ticker');
        foreach ($moscowStocks as $index => $stockId)
        {
            $indices = $imoexStock->getIndicesListForTickerFromApi($index);
            foreach ($indices as $val)
            {
                $indexId = MoscowIndex::select('id')->where('index_name', $val)->pluck('id');
                if(!isset($indexId[0])) continue;
                MoscowStockIndex::insertOrIgnore(['stock_id' => $stockId, 'index_id' => $indexId[0]]);
            }
        }
    }
}
