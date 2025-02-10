<?php

namespace App\Policies;

use App\Models\Scores;
use App\Models\User;

class ScorePolicy
{
    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Scores $scores): bool
    {
        //
    }

    public function create(User $user): bool
    {
        // return $user->hasRole('teacher');
    }

    public function update(User $user, Scores $scores): bool
    {
        //
    }

    public function delete(User $user, Scores $scores): bool
    {
        return $user?->id === $scores->user_id;
    }

    public function restore(User $user, Scores $scores): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Scores $scores): bool
    {
        //
    }
}
