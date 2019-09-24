<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailchipInfo extends Model
{
    protected $table = 'mailchip_info';
    protected $fillable = [
        'campaing_id', 'api_key',
    ];

    public function updateMailchipinfo($data){
        $mailchip_info = $this->find($data['id']);
        $mailchip_info->campaing_id = $data['campaing_id'];
        $mailchip_info->api_key = $data['api_key'];
        $mailchip_info->save();
        return 1;
    }
}
