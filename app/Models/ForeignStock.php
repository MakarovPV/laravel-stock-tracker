<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForeignStock extends Model
{
    use HasFactory;

    protected $fillable = ['ticker', 'stock_name', 'sector'];

    /**
     * Получение списка секторов.
     *
     * @return mixed
     */
    public static function getSectors(): Collection
    {
        return self::distinct()->pluck('sector')->filter();
    }

    /**
     * Получение списка акций по указанному сектору. В случае отсутствия первого аргумента выводит список всех акций.
     *
     * @param string $sector
     * @param int $perPage
     * @return mixed
     */
    public function getStockListBySector(string $sector = '', int $perPage = 25): mixed
    {
        return $this->when($sector, fn($q) => $q->where('sector', $sector))
            ->simplePaginate($perPage);
    }

    /**
     * Получение тикера акции по указанному id.
     *
     * @param int $id
     * @return mixed
     */
    public static function getStockTickerById(int $id): mixed
    {
        return self::where('id', $id)->value('ticker');
    }
}
