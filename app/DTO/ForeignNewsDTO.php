<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ForeignNewsDTO extends DataTransferObject
{
    public string $title;
    public string $published_at;
    public string $body;
}
