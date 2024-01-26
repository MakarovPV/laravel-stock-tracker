<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MoscowIndex extends Model
{
    use HasFactory;

    protected $table = 'moscow_indices';

    protected $fillable = ['id', 'index_name', 'short_name'];

    public function indices(): BelongsToMany
    {
        return $this->belongsToMany(MoscowStock::class, 'moscow_stocks_indices');
    }
}
