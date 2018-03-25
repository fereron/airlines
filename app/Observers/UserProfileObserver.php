<?php

namespace App\Observers;


use App\User;

class UserProfileObserver
{

    public function created(User $user)
    {
        $user->profile()->create();
    }

}