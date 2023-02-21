<?php

namespace App\Modules;

class StartDateSetting
{
    private string $time_interval;

    public function __construct($time_interval)
    {
        $this->time_interval = $time_interval;
    }

    public function selectInterval() : string
    {
        switch ($this->time_interval) {
            case 'day': return (new StartDateLastDay())->getStartDate();
            case 'month': return (new StartDateLastMonth())->getStartDate();
            case 'year': return (new StartDateLastYear())->getStartDate();
            case 'week': return (new StartDateLastWeek())->getStartDate();
        }
        return false;
    }
}
