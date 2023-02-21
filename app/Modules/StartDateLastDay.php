<?php

namespace App\Modules;

use Carbon\Carbon;

class StartDateLastDay extends StartDate
{
    public function getStartDate() : string
    {
        return Carbon::now()->subDay()->format('Y-m-d');
    }
}
