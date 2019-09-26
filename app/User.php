<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password','is_admin', 'role',
        'username', 'points'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdministrator() {
        return $this->role == 'admin';
    }
    public function saveUser($data)
    {
        $this->name = $data['name'];
        $this->last_name = $data['last_name'];
        $this->email = $data['email'];
        if( isset($data['points'])){
            $this->points = $data['points'];
        }
        $this->password = Hash::make($data['password']);
        $this->username = substr(md5(time()), 0, 10);
        $this->save();
        return 1;
    }

    public function updateUser($data)
    {
            $user = $this->find($data['id']);
            $user->name = $data['name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->points = $data['points'];
            $user->save();
            return 1;
    }
    
}
