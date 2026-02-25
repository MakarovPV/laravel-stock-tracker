<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

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
//        $tickerName = (new ForeignStockRepository())->getStockTickerById($id);
//        $stockInfo = (new ForeignStockCategoryController())->getStockInfo($id, $tickerName);
//        self::insertOrIgnore($stockInfo);
//
//        return $stockInfo;
    }
}
