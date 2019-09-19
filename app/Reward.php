<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'reward_name', 'reward_description', 'reward_image', 'reward_worth', 'reward_type_id'
    ];

    public function saveTicket($data)
    {
        $this->reward_name = $data['reward_name'];
        $this->reward_description = $data['reward_description'];
        $this->reward_image = $data['reward_image'];
        $this->reward_worth = $data['reward_worth'];
        $this->reward_type_id = $data['reward_type_id'];
        $this->save();
        return 1;
    }
}

