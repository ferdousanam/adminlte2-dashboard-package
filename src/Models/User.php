<?php

namespace Anam\Dashboard\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'profile_image', 'password', 'user_level', 'status'
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

    protected $dates = [
        'created_at', 'updated_at', 'last_login_at', 'last_failed_login_at'
    ];

    public function shouldHaveSelfVisibility()
    {
        return $this->makeVisible([
            'name', 'email', 'profile_image', 'password', 'user_level', 'status',
        ]);
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'user_level', 'id');
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }
}
