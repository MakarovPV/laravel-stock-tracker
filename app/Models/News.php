<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title_id', 'body', 'published_at'];

    public function title(): BelongsTo
    {
        return $this->BelongsTo(NewsTitle::class, 'title_id');
    }
}
