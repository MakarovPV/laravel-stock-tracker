<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoscowNews extends News
{
    protected $fillable = ['id', 'title', 'body', 'published_at'];
}
