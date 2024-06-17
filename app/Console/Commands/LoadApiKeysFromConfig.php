<?php

namespace App\Console\Commands;

use App\Actions\ApiKeyStoreAction;
use App\DTO\ApiKeyDTO;
use Illuminate\Console\Command;

class LoadApiKeysFromConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:api_keys';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загрузка api-ключей из конфига';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ApiKeyStoreAction $action)
    {
        $collection = collect(config('apikeys'))->flatten(1);
        $collection->each(function ($item) use ($action){
            foreach ($item as $array){
                $action(new ApiKeyDTO($array));
            }
        });
    }
}
