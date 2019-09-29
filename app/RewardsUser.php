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


    public function saveRewardUser($data,$avaible)
    {
        $this->reward_id = $data['reward'];
        $this->user_id = $data['user'];
        if(isset($avaible)){
            $this->avaible = 1;
        }
        $this->save();
        return 1;
    }

    public function updateRewardUser($data,$avaible)
    {
        $rewardUser = $this->find($data['id']);
        $rewardUser->reward_id = $data['reward'];
        $rewardUser->user_id = $data['user'];
        $rewardUser->avaible = 0;
        if(!is_null($avaible)){
            $rewardUser->avaible = 1;
        }
        $rewardUser->save();
        return 1;
    }

}