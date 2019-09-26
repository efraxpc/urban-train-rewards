<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WellcomeEmailInfo extends Model
{
    protected $table = 'wellcome_email_info';

    protected $fillable = [
        'tittle', 'content', 'footer', 'pre_footer'
    ];

    public function updateWellcomeEmailInfo($data)
    {
            $wellcome_email_info = $this->find($data['id']);
            $wellcome_email_info->tittle = $data['tittle'];
            $wellcome_email_info->content = $data['content'];
            $wellcome_email_info->pre_footer = $data['pre_footer'];
            $wellcome_email_info->footer = $data['footer'];
            $wellcome_email_info->save();
            return 1;
    }
}
