<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermission('courses_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Course $course)
    {
        return $user->hasPermission('courses_view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasPermission('courses_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Course $course)
    {
        return $user->hasPermission('courses_update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Course $course)
    {
        return $user->hasPermission('courses_delete');
    }
}
