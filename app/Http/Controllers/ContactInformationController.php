<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ContactInfo;

class ContactInformationController extends Controller
{
    public function getIndex()
    {
        $contact_info = ContactInfo::find(1);
        return view('pages.backend.contactInfo.index',compact('contact_info'));
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'phone_number'=>'required',
            'mail_contact'=> 'required',
            'address'=>'required'
        ]);
        $contact_info = new ContactInfo();
        $data['id'] = 1;
        $contact_info->updateContactInfo($data);        
        return redirect('/backend/contact-information')->with('success', 'Contact Info info has been updated!!');
    }
}
