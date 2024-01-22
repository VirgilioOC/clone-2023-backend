<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function accessAnyone(User $user)
    {
        return $user->rol == 'admin' || $user->rol == 'editor';
    }

    public function accessOnlyAdmin(User $user)
    {
        return $user->rol == 'admin';
    }
}
