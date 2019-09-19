<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Reward;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::all();
        
        return view('rewards.index',compact('rewards'));
    }
    public function store(Request $request)
    {
        $reward = new Reward();
        $data = $this->validate($request, [
            'reward_name'=>'required',
            'reward_description'=> 'required',
            'reward_image'=> 'required',
            'reward_worth'=> 'required',
            'reward_type_id'=> 'required',
        ]);
       
        $reward->save($data);
        return redirect('rewards.home')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }
}