<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \DrewM\MailChimp\MailChimp;
use Mail;
use App\Mail\OrderShipped;
use App\MailchipInfo;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $mailchip_info = Mailchipinfo::where('id',1)->first();
        $MailChimp = new MailChimp($mailchip_info->api_key);
        $result = $MailChimp->get('lists');
      
        $list_id = $mailchip_info->campaing_id;

        $result = $MailChimp->post("lists/$list_id/members", [
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email_address' => $data['email'],
            'status'        => 'subscribed',
        ]);
            
        Mail::to($data['email'])->send(new OrderShipped('subject','message'));
        $admin_user = User::where('id', 1)->first();
        $refferal= $admin_user->username;
        if(isset($data['refferal'])){
            $user = User::where('username', $data['refferal'])->first();
            if($user){
                $refferal = $data['refferal'];
            }else{
                $user = User::where('id', 1)->first();
                $refferal = $user->username;
            }
        }
        
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => substr(md5(time()), 0, 10),
            'refferal' => $refferal
        ]);
    }
}