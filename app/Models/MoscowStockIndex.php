<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoscowStockIndex extends Model
{
    use HasFactory;

    protected $table = 'moscow_stocks_indices';
    public $timestamps = false;
    protected $fillable = ['stock_id', 'index_id'];
}
