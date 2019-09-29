<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'reward_name', 'reward_description', 'reward_image', 'reward_worth', 'reward_type_id'
    ];

    public function rewardsUser()
    {
        return $this->belongsTo('RewardsUser');
    }

    public function saveReward($data,$file_name)
    {
        $this->reward_name = $data['reward_name'];
        $this->reward_description = $data['reward_description'];
        $this->reward_image = $file_name;
        $this->reward_worth = $data['reward_worth'];
        $this->reward_type_id = $data['reward_type'];
        $this->offer_id = $data['offer'];
        $this->save();

        return 1;
    }
    public function updateReward($data)
    {
            $reward = $this->find($data['id']);
            $reward->reward_name = $data['reward_name'];
            $reward->reward_description = $data['reward_description'];
            $reward->reward_worth = $data['reward_worth'];
            $reward->reward_type_id = $data['reward_type'];
            $reward->offer_id = $data['offer'];
            if(isset($data['reward_image'])){
                $reward->reward_image = $data['reward_image'];
            }
            $reward->save();
            return 1;
    }
}

