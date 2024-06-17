<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class MoscowStockIndexDTO extends DataTransferObject
{
    public int $stock_id;
    public int $index_id;
}
