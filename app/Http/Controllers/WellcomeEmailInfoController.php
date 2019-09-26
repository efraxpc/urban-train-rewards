<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WellcomeEmailInfo;

class WellcomeEmailInfoController extends Controller
{
    public function getIndex()
    {
        $wellcome_email_info = WellcomeEmailInfo::find(1);
        return view('pages.backend.wellcomeEmailInfo.index',compact('wellcome_email_info'));
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'tittle'=>'required',
            'content'=> 'required',
            'pre_footer'=>'required',
            'footer'=>'required',
        ]);
        $wellcome_email_info = new WellcomeEmailInfo();
        $data['id'] = 1;
        $wellcome_email_info->updateWellcomeEmailInfo($data);        
        return redirect('/backend/wellcome-email-information')->with('success', 'Wellcome email Info has been updated!!');
    }
}