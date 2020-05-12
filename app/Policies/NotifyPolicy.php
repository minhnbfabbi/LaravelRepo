<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notify;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Traits\HandleCheckAuthorization;

class NotifyPolicy
{
    use HandlesAuthorization;
    use HandleCheckAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function list(User $user)
    {
        return $this->isAdmin($user);
    }

    public function create(User $user)
    {
        return $this->isAdmin($user);
    }

    public function store(User $user)
    {
        return $this->isAdmin($user);
    }
}
