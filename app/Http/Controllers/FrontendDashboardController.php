<?php

namespace App\Http\Controllers;
use App\RewardsUser;
use App\Reward;
use App\ContactInfo;
use Illuminate\Http\Request;
use App\User;
use App\Offer;
use DB;
use App\RewardUser;

class FrontendDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){
        $user = auth()->user();
        $user_rewards_obj=[];
        $rewards_user_query = DB::table('rewards_user')->where([
            ['user_id', $user->id],
        ])->get();

        foreach($rewards_user_query as $key => $rewards_user){
            $reward = Reward::where('id',$rewards_user->reward_id)->first();
            $user_rewards_obj[$key]['reward_name'] = $reward->reward_name;
            $user_rewards_obj[$key]['created_at'] = $rewards_user_query[$key]->created_at;
            $user_rewards_obj[$key]['avaible'] = $rewards_user_query[$key]->avaible;
        }

        $user = User::where('id', $user->id )->first();
        $refferal_link = url('/')."/refferal/".$user->username;

        $show_claim_buttom = false;
        if(intval($user->points) >= 1 ){
            $show_claim_buttom = true;
        }
        $refferal = User::where('username', $user->refferal )->first();
        $contact_info = ContactInfo::find(1);
        return view('pages.frontend.dashboard.index',compact('user_rewards_obj',
            'contact_info','user','refferal','refferal_link','show_claim_buttom'));
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

    public function assingOfferToUser($offer_id){

        $reward = Reward::where('offer_id',$offer_id)->first();
        $offer = Offer::where('id', $offer_id )->first();
        $user = auth()->user();
        $reward_user =new RewardUser();
        $reward_user->user_id = $user->id;
        $reward_user->reward_id = $reward->id;
        $reward_user->save();

        return redirect($offer->offer_link);
    }
}