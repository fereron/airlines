<?php

namespace App\Observers;

use App\User;

class UserAvatarObserver {

    public function creating(User $user)
    {
        $user->avatar = 'no-user.gif';
    }

}