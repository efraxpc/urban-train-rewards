<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RewardType extends Model
{
    protected $table = 'rewards_type';

    protected $fillable = [
        'name'
    ];
}
