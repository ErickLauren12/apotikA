<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class checkmember
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checkmember(User $user){
        return ($user->sebagai == "Member"
            ? Response::allow()
            : Response::deny('Anda harus daftar sebagai member'));
        
    }
}
