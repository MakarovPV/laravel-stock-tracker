<?php

namespace App\Utilities\Dates;

use Carbon\Carbon;

class StartDateLastWeek implements StartDate
{
    public function getStartDate(): string
    {
        return Carbon::now()->subDays(7)->format('Y-m-d');
    }
}
