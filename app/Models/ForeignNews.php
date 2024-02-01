<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForeignNews extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['title', 'body', 'published_at'];
}
