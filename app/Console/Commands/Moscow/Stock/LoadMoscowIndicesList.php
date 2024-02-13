<?php

namespace App\Console\Commands\Moscow\Stock;

use App\Helpers\Api\Stocks\Stock\Moscow\ImoexStock;
use App\Models\MoscowIndex;
use Illuminate\Console\Command;

class LoadMoscowIndicesList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:moscow_indices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загрузка списка российских индексов';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImoexStock $imoexStock)
    {
        MoscowIndex::insertOrIgnore($imoexStock->getIndicesListFromApi());

        echo 'Список индексов московской биржи загружен.' . PHP_EOL;
    }
}
