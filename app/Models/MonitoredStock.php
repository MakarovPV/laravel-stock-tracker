<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoredStock extends Model
{
    use HasFactory;

    protected $table = 'monitored_stocks';

    protected $fillable = ['user_id', 'stock_name', 'stock_ticker_symbol', 'stock_exchange'];
}
