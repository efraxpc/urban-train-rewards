<?php

namespace App\Http\Controllers;
use App\RewardsUser;
use App\Reward;
use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class RewardUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex()
    {
        if(request()->ajax()) {
            $rewards_user = RewardsUser::select([
                'rewards_user.id',
                'rewards.reward_name',
                'users.name as user_name',
                'users.last_name as user_last_name',
                'rewards_user.avaible',
            ])->join('rewards','rewards.id','=','rewards_user.reward_id')
                ->join('users','users.id','=','rewards_user.user_id')
                ->orderBy('rewards_user.id')
                ->get();
            return Datatables::of($rewards_user)
                ->addColumn('action', function ($rewards_user) {
                    return '<a href="/backend/edit/rewards_user/'.$rewards_user->id.'" class="btn btn-xs btn-primary">
<i class="glyphicon glyphicon-edit"></i> Edit</a>
<a href="/backend/delete/rewards_user/'.$rewards_user->id.'" class="btn btn-xs btn-danger m-2"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
                })
                ->make(true);
        }
        return view('pages.backend.rewardsUser.index');
    }

    public function create()
    {
        $rewards = Reward::all();
        $users = User::All();
        return view('pages.backend.rewardsUser.create', compact('rewards','users'));
    }

    public function store(Request $request)
    {
        $rewardUser = new RewardsUser();
        $data = $this->validate($request, [
            'user'=>'required',
            'reward'=> 'required',
        ]);
        $avaible = $request->avaible;
        $rewardUser->saveRewardUser($data,$avaible);
        return redirect('backend/rewards_user')->with('success', 'Reward user has been created!');
    }

    public function edit($id)
    {
        $reward_user = RewardsUser::where('id', $id)
            ->first();
        $rewards = Reward::all();
        $users = User::All();
        return view('pages.backend.rewardsUser.edit', compact('reward_user', 'rewards', 'users', 'id'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'user'=>'required',
            'reward'=> 'required',
        ]);

        $reward = new RewardsUser();
        $avaible = $request->avaible;
        $data['id'] = $id;
        $reward->updateRewardUser($data,$avaible);
        return redirect('/backend/rewards_user')->with('success', 'Reward User has been updated!!');
    }
    public function destroy($id)
    {
        $rewardUser = RewardsUser::find($id);
        $rewardUser->delete();

        return redirect('/backend/rewards_user')->with('success', 'Reward User has been deleted!!');
    }
}
