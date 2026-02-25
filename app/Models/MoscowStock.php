<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MoscowStock extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['ticker', 'stock_name'];

    public function indices(): BelongsToMany
    {
        return $this->belongsToMany(MoscowIndex::class, 'moscow_stocks_indices', 'stock_id', 'index_id');
    }

    /**
     * Получение списка акций по указанному сектору. В случае отсутствия первого аргумента выводит список всех акций.
     *
     * @param string $index
     * @param $perPage
     *
     */
    public function getStockListBySector(string $index = '', int $perPage = 25)
    {
        if (!$index) return $this->simplePaginate($perPage);

        $stocks = MoscowIndex::getStockList($index);
        return $this->whereIn('id', $stocks)->simplePaginate($perPage);
    }
}
