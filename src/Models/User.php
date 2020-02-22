<?php

namespace Anam\Dashboard\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\RoutesNotifications;

class User extends Authenticatable {
    use RoutesNotifications;
    public function shouldHaveSelfVisibility()
    {
        return $this->makeVisible([
            'name', 'email', 'profile_image', 'password', 'user_level', 'status',
        ]);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }
}
