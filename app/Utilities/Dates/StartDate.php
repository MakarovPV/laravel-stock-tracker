<?php

namespace App\Utilities\Dates;

interface StartDate
{
    /**
     * Получение даты, которая будет являться стартовой точкой временного интервала при получении данных по api.
     *
     * @return string
     */
    public function getStartDate(): string;
}
