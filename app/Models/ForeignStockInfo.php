<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForeignStockInfo extends Model
{
    use HasFactory;

    protected $table = 'foreign_stock_info';
    public $timestamps = false;
    protected $fillable = [ 'ticker',
                            'stock_id',
                            'price',
                            'volatility',
                            'capitalization',
                            'last_dividends',
                            'changes',
                            'company_name',
                            'currency',
                            'exchange',
                            'industry',
                            'website',
                            'description',
                            'ceo',
                            'sector',
                            'country',
                            'employees',
                            'phone',
                            'address',
                            'city',
                            'state',
                            'zip',
                            'dcf_price',
                            'dcf_price_difference'
    ];
}
