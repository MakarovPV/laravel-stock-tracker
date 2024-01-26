<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NewsTitle extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'published_at'];

    public function title(): HasOne
    {
        return $this->hasOne(News::class, 'title_id');
    }
}
