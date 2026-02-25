<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoredStock extends Model
{
    use HasFactory;

    protected $table = 'monitored_stocks';
    protected $fillable = ['user_id', 'stock_name', 'stock_ticker_symbol', 'stock_exchange'];

    /**
     * Получение списка отслеживаемых пользователем активов по категории (акции/криптовалюта и т.д.).
     *
     * @param string $stock_exchange
     * @return Collection
     */
    public static function stockListByCategory(string $exchange): Collection
    {
        return self::where('user_id', auth()->id())
            ->where('stock_exchange', $exchange)
            ->get();
    }

    /**
     * Получение списка отслеживаемых пользователем активов по всем переданным категориям.
     *
     * @param array $exchanges
     * @return Collection
     */
    public static function stockListByAllCategories(array $exchanges): Collection
    {
        return collect($exchanges)->mapWithKeys(fn(string $ex) => [$ex => self::stockListByCategory($ex)]);
    }
}
