<?php

namespace App\Policies;

use App\Models\Level;
use App\Models\User;

class LevelPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermission('levels_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Level $level)
    {
        return $user->hasPermission('levels_view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasPermission('levels_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Level $level)
    {
        return $user->hasPermission('levels_update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Level $level)
    {
        return $user->hasPermission('levels_delete');
    }
}
