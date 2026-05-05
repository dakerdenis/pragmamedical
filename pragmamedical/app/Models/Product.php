<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'main_image',
        'image_1',
        'image_2',
        'image_3',
        'image_4',

        'title_az',
        'title_ru',
        'title_en',

        'price',

        'description_az',
        'description_ru',
        'description_en',

        'usage_az',
        'usage_ru',
        'usage_en',

        'indications_az',
        'indications_ru',
        'indications_en',
    ];
}