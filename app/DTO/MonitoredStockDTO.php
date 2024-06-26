<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class MonitoredStockDTO extends DataTransferObject
{
    public string $stock_name;
    public string $stock_ticker;
    public string $stock_category_id;
}
