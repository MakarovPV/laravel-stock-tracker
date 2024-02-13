<?php

namespace App\Modules;

class StartDateFactory
{
    private string $time_interval;

    public function __construct(string $time_interval)
    {
        $this->time_interval = $time_interval;
    }

    /**
     * Получение стартовой даты в зависимости от переданного интервала.
     *
     * @return string
     */
    public function selectInterval(): string
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
