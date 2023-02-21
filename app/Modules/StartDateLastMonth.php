<?php

namespace App\Modules;

use Carbon\Carbon;

class StartDateLastMonth extends StartDate
{
    public function getStartDate() : string
    {
        return Carbon::now()->subDays(30)->format('Y-m-d');
    }
}
