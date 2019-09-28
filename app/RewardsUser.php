<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class RewardsUser extends Model
{
    protected $table = 'rewards_user';
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function rewards()
    {
        return $this->belongsTo(Reward::class);
    }
}