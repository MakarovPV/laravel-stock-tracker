<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MoscowStock extends Model
{
    use HasFactory;

    public function indices(): BelongsToMany
    {
        return $this->belongsToMany(MoscowIndex::class, 'moscow_stocks_indices');
    }
}
