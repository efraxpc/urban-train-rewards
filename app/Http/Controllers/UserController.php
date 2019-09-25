<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function getIndex()
    {
        if(request()->ajax()) {
            $users = User::select([
                'users.id',
                'users.name',
                'users.last_name',
                'users.email',
                'users.username',
                'users.completed_surveys',
                'users.points',
                'users.created_at',
            ])
            ->orderBy('id')
            ->get();
            
            return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="/backend/edit/user/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="/backend/delete/user/'.$user->id.'" class="btn btn-xs btn-danger m-2"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            })
            ->make(true);
        }
        return view('pages.backend.users.index');
    }
    // public function create()
    // {
    //     return view('pages.backend.users.create');
    // }
    // public function store(Request $request)
    // {
    //     $reward = new Reward();
    //     $data = $this->validate($request, [
    //         'reward_name'=>'required',
    //         'reward_description'=> 'required',
    //         'reward_image'=> 'required',
    //         'reward_worth'=> 'required',
    //         'reward_type'=> 'required',
    //     ]);
    //     $file_name = $request->reward_image->hashName();
    //     $file = $request->reward_image;
       
    //     $reward->saveReward($data, $file_name);
        
    //     Storage::disk('public')->put('images', $file);
    //     return redirect('rewards')->with('success', 'Reward has been created!');
    // }
}
