<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'main_image',
        'title_az',
        'title_ru',
        'title_en',
        'published_date',
        'description_az',
        'description_ru',
        'description_en',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
    ];
}