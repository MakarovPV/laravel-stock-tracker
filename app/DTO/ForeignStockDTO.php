<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ForeignStockDTO extends DataTransferObject
{
    public string $ticker;
    public string $stock_name;
    public string $sector;
}
