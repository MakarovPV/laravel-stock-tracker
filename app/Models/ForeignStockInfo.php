<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function stock(): BelongsTo
    {
        return $this->belongsTo(ForeignStock::class, 'stock_id');
    }

    /**
     * Получение всей информации по конкретной акции.
     *
     * @param int $id
     * @return Collection|false
     */
    public static function getInfo(int $id): Collection|false
    {
        $query = self::where('stock_id', $id);
        if($query->exists()) return $query->get();

        return false;
    }
}
