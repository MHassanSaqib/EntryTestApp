<?php

namespace App\Observers;

use App\Question;
use Auth;

class QuestionObserver
{
    /**
     * Handle the  question "created" event.
     *
     * @param  \App\Question  $Question
     * @return void
     */
    public function creating(Question $question)
    {
        $question->user_id = Auth::user()->id;
    }

    /**
     * Handle the  question "updated" event.
     *
     * @param  \App\Question  $Question
     * @return void
     */
    public function updated(Question $question)
    {
        //
    }

    /**
     * Handle the  question "deleted" event.
     *
     * @param  \App\Question  $Question
     * @return void
     */
    public function deleted(Question $question)
    {
        //
    }

    /**
     * Handle the  question "restored" event.
     *
     * @param  \App\Question  $Question
     * @return void
     */
    public function restored(Question $question)
    {
        //
    }

    /**
     * Handle the  question "force deleted" event.
     *
     * @param  \App\Question  $Question
     * @return void
     */
    public function forceDeleted(Question $question)
    {
        //
    }
}
