<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class LoadData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загрузка всех данных';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('key:generate');

        Artisan::call('create:database');
        Artisan::call('migrate');

        Artisan::call('load:api_keys');
        Artisan::call('load:moscow_data');
        Artisan::call('load:foreign_data');

        echo 'Все данные загружены.' . PHP_EOL;
    }
}
