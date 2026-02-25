<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoscowStockIndex extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'moscow_stocks_indices';
    protected $fillable = ['stock_id', 'index_id'];
}
