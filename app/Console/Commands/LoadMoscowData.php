<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class LoadMoscowData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:moscow_data';

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
    public function handle()
    {
        Artisan::call('load:moscow_stock');
        Artisan::call('load:moscow_indices');
        Artisan::call('load:moscow_stock_indices');

        Artisan::call('load:moscow_news');

        echo 'Данные московской биржи загружены' . PHP_EOL;
    }
}
