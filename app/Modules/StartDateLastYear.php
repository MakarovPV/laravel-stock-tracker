<?php

namespace App\Modules;

use Carbon\Carbon;

class StartDateLastYear implements StartDate
{
    public function getStartDate(): string
    {
        return Carbon::now()->subDays(365)->format('Y-m-d');
    }
}
