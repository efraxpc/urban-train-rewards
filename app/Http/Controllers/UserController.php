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
    public function create()
    {
        return view('pages.backend.users.create');
    }
    public function store(Request $request)
    {
        $user = new User();
        $data = $this->validate($request, [
            'name'=>'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'password' => 'required|confirmed|min:8',
        ]);
    
        $user->saveUser($data);
        return redirect('/backend/users')->with('success', 'User has been created!');
    }
    public function edit($id)
    {
        $user = User::where('id', $id)
                        ->first();
        return view('pages.backend.users.edit', compact('user', 'id'));
    }
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name'=>'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'points'=> 'required',
        ]);
        $data['id'] = $id;
        $user = new User();
        $user->updateUser($data);        
        return redirect('/backend/users')->with('success', 'User has been updated!!');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/backend/users')->with('success', 'User has been deleted!!');
    }
}