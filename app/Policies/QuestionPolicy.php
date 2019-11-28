<?php

namespace App\Policies;

use App\Question;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class QuestionPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Question $question)
    {
        return true;
    }

    public function create(User $user)
    {
        return ($user->role == 'admin');
    }

    public function update(User $user, Question $question)
    {
        if ($user->role != 'admin') 
            return false;
        return ($question->user_id == $user->id);
    }

    public function delete(User $user, Question $question)
    {
        return ($user->role == 'admin');
    }

    public function restore(User $user, Question $question)
    {
        //
    }

    public function forceDelete(User $user, Question $question)
    {
        //
    }
}
