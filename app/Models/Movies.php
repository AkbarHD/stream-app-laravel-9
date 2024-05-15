<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movies extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'movies';

    protected $fillable = [
        'title',
        'trailer',
        'movie',
        'casts',
        'categories',
        'small_thumbnail',
        'large_thumbnail',
        'release_date',
        'about',
        'short_about',
        'duration',
        'featured',
    ];
}
