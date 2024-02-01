<?php

namespace App\Console\Commands\Foreign;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class LoadForeignData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:foreign_data';

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
        Artisan::call('load:foreign_stock');

        Artisan::call('load:foreign_news');

        echo 'Данные по зарубежным активам загружены.' . PHP_EOL;
    }
}
