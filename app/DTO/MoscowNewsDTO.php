<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class MoscowNewsDTO extends DataTransferObject
{
    public int $id;
    public string $title;
    public string $published_at;
    public string $body;
}
