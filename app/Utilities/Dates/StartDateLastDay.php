<?php

namespace App\Utilities\Dates;

use Carbon\Carbon;

class StartDateLastDay implements StartDate
{
    public function getStartDate(): string
    {
        return Carbon::now()->subDay()->format('Y-m-d');
    }
}
