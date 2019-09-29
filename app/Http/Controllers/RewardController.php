<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Reward;
use App\RewardType;
use App\Offer;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class RewardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        if(request()->ajax()) {
            $rewards = Reward::select([
                'rewards.id',
                'rewards.reward_name',
                'rewards.reward_description',
                'rewards_type.name as type',
                'rewards.reward_image',
                'rewards.reward_worth',
                'rewards.created_at',
            ])->join('rewards_type','rewards_type.id','=','rewards.reward_type_id')
            ->orderBy('id')
            
            ->get();
            return Datatables::of($rewards)
            ->addColumn('action', function ($reward) {
                return '<a href="/backend/edit/reward/'.$reward->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="/backend/delete/reward/'.$reward->id.'" class="btn btn-xs btn-danger m-2"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            })
            ->make(true);
        }
        return view('pages.backend.rewards.index');
    }
    public function create()
    {
        $reward_types = RewardType::all();
        $offers = Offer::all();
        return view('pages.backend.rewards.create', compact('reward_types','offers'));
    }
    public function store(Request $request)
    {
        $reward = new Reward();
        $data = $this->validate($request, [
            'reward_name'=>'required',
            'reward_description'=> 'required',
            'reward_image'=> 'required',
            'reward_worth'=> 'required',
            'reward_type'=> 'required',
            'offer'=> 'required',
        ]);
        $file_name = $request->reward_image->hashName();
        $file = $request->reward_image;
       
        $reward->saveReward($data, $file_name);
        
        Storage::disk('public')->put('images', $file);
        return redirect('backend/rewards')->with('success', 'Reward has been created!');
    }
    public function edit($id)
    {
        $reward = Reward::where('id', $id)
                        ->first();
        $offers = Offer::all();
        $reward_types = RewardType::all();
        return view('pages.backend.rewards.edit', compact('reward', 'reward_types', 'offers', 'id'));
    }
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'reward_name'=>'required',
            'reward_description'=> 'required',
            'reward_worth'=> 'required',
            'reward_type'=> 'required',
            'offer'=> 'required',
        ]);
        $reward = new Reward();

        if(isset($request->reward_image)){
            $file_name = $request->reward_image->hashName();
            $file = $request->reward_image;
            Storage::disk('public')->put('images', $file);
            $data['reward_image'] = $file_name;
        }

        $data['id'] = $id;
        $reward->updateReward($data);        
        return redirect('/backend/rewards')->with('success', 'Reward has been updated!!');
    }

    public function destroy($id)
    {
        $reward = Reward::find($id);
        $reward->delete();

        return redirect('/backend/rewards')->with('success', 'Reward has been deleted!!');
    }
}