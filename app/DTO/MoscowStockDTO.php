<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class MoscowStockDTO extends DataTransferObject
{
    public string $ticker;
    public string $stock_name;
}
