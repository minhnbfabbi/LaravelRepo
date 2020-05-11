<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notify;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotifyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function create(User $user)
    {
        return $user->is_admin === 1;
    }

    public function store(User $user)
    {
        return $user->is_admin === 1;
    }
}
