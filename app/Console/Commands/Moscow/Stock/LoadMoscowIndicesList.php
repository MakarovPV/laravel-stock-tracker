<?php

namespace App\Console\Commands\Moscow\Stock;

use App\Actions\MoscowIndexStoreAction;
use App\DTO\MoscowIndexDTO;
use App\Services\Stocks\Stock\Moscow\ImoexStock;
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
    public function handle(ImoexStock $imoexStock, MoscowIndexStoreAction $action)
    {
        foreach ($imoexStock->getIndicesListFromApi() as $array){
            $action(new MoscowIndexDTO($array));
        }

        echo 'Список индексов московской биржи загружен.' . PHP_EOL;
    }
}
