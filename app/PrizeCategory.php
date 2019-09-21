<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrizeCategory extends Model
{
    protected $table = 'prize_category';
    protected $fillable = [
        'prize_category_name', 'prize_category_image', 'prize_category_description'
    ];
}
