<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class MoscowIndexDTO extends DataTransferObject
{
    public string $index_name;
    public string $short_name;
}
