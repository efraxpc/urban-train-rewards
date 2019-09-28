<?php

namespace App\Http\Controllers;
use App\RewardsUser;
use App\Reward;
use App\ContactInfo;
use Illuminate\Http\Request;
use App\User;

class FrontendDashboardController extends Controller
{
    public function getIndex(){
        $user = auth()->user();
        $user_rewards_obj=[];
        $rewards_user_query = RewardsUser::where('user_id', $user->id, )->get();
        foreach($rewards_user_query as $rewards_user){
            $user_rewards_obj[] = Reward::where('id',$rewards_user->reward_id)->first();
        }
        $user = User::where('id', $user->id, )->first();
        $refferal_link = url('/')."/refferal/".$user->username;

        $show_claim_buttom = false;

        if(intval($user->points) >= 1 ){
            $show_claim_buttom = true;
        }
        $refferal = User::where('username', $user->refferal )->first();
        $contact_info = ContactInfo::find(1);
        return view('pages.frontend.dashboard.index',compact('user_rewards_obj','contact_info','user','refferal','refferal_link','show_claim_buttom'));
    }

    public function refferal($refferal_id){
        return redirect("register/$refferal_id");
    }

    public function register( Request $request, $refferal_id){


        return view('pages.frontend.dashboard.register',compact('refferal_id'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $data = $this->validate($request, [
            'name'=>'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'password' => 'required|confirmed|min:8',
            'refferal'=> 'required',
        ]);
        $user->saveUser($data);
        return redirect('/backend/users')->with('success', 'User has been created!');
    }
}