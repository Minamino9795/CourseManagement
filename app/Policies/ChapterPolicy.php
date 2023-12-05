<?php

namespace App\Policies;

use App\Models\Chapter;
use App\Models\User;

class ChapterPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermission('chapters_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Chapter $chapter)
    {
        return $user->hasPermission('chapters_view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasPermission('chapters_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chapter $chapter)
    {
        return $user->hasPermission('chapters_update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chapter $chapter)
    {
        return $user->hasPermission('chapters_delete');
    }
}
