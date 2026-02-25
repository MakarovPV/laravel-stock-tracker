<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = ['site_url', 'api_key', 'requests_limit', 'limit_interval'];

    /**
     * Получение api-ключа для указанного сайта.
     *
     * @param string $url
     * @return string
     */
    public static function apiKeyByUrl(string $url): ?string
    {
        return self::where('site_url', $url)->value('api_key');
    }
}
