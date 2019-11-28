<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionTrashController extends Controller
{
    public function index()
    {
    	$questions = Question::onlyTrashed()->paginate(10);
    	return view('trash.question.index')->with('questions', $questions);
    }

    public function restore($id)
    {
    	Question::withTrashed()->find($id)->restore();
    	//$question->restore();
    	return redirect()->back();
    }
}
