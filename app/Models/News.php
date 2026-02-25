<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class News extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id', 'title', 'body', 'published_at'];

    /**
     * Получение списка всех новостных заголовков с пагинацией.
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public static function getNewsWithPaginate(int $perPage = 25): LengthAwarePaginator
    {
        return self::select('id', 'title', 'published_at')->simplePaginate($perPage);
    }

    /**
     * Получение содержимого конкретной новости.
     *
     * @param int $id
     * @return self|null
     */
    public static function getFullNewsById(int $id): ?self
    {
        return self::select('title', 'body')->find($id);
    }
}
