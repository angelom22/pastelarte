<?php

namespace App\Policies;

use App\User;
use App\Models\Curso;
use Illuminate\Auth\Access\HandlesAuthorization;

class CursoPolicy
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

    public function purchaseCurso (User $user, Curso $curso) {
        $isOwnerUser = $user->id === $curso->user_id;
        $cursoPurchased = $curso->estudiantes->contains($user->id);
        return !$isOwnerUser && !$cursoPurchased;
    }

    public function review (User $user, Curso $curso) {
        $cursoPurchased = $curso->estudiantes->contains($user->id);
        $reviewed = $curso->reviews->contains('user_id', $user->id);
        return $cursoPurchased && !$reviewed;
    }
}

