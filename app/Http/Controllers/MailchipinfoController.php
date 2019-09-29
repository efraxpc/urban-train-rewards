<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MailchipInfo;

class MailchipinfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex($prize_category_id = 0)
    {
        $mailchip_info = Mailchipinfo::where('id',1)->first();
        return view('pages.backend.mailchipInfo.index',compact("mailchip_info"));
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'campaing_id'=>'required',
            'api_key'=> 'required'
        ]);
        $reward = new MailchipInfo();

        $data['id'] = 1;
        $reward->updateMailchipinfo($data);        
        return redirect('/backend/offers')->with('success', 'Mailchip info has been updated!!');
    }
}
