<?php

namespace App\Policies;

use App\Models\Lession;
use App\Models\User;

class LessionsPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermission('lessions_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lession $lession)
    {
        return $user->hasPermission('lessions_view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasPermission('lessions_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lession $lession)
    {
        return $user->hasPermission('lessions_update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lession $lession)
    {
        return $user->hasPermission('lessions_delete');
    }
}
