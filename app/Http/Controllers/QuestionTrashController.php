<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionTrashController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
    	$questions = Question::onlyTrashed()->paginate(10);
    	return view('trash.question.index')->with('questions', $questions);
    }

    public function restore($question)
    {
    	Question::withTrashed()->find($question)->restore();
    	//$question->restore();
    	return redirect()->back();
    }


    public function forceDelete($question)
    {
		Question::withTrashed()->find($question)->forceDelete();
    	return redirect()->back();    	
    }
}
