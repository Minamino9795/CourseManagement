<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $item)
    {
        return $item->hasPermission('users_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $item)
    {
        return $item->hasPermission('users_view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $item)
    {
        return $item->hasPermission('users_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $item)
    {
        return $item->hasPermission('users_update');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $item)
    {
        return $item->hasPermission('users_delete');
    }

}
