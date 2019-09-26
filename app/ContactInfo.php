<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contact_info';
    protected $fillable = [
        'phone_number', 'mail_contact', 'address'
    ];

    public function updateContactInfo($data)
    {
        $contact_info = $this->find($data['id']);
        $contact_info->phone_number = $data['phone_number'];
        $contact_info->mail_contact = $data['mail_contact'];
        $contact_info->address = $data['address'];
        $contact_info->save();
        return 1;
    }

    
}