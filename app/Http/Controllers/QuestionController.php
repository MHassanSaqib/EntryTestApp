<?php

namespace App\Http\Controllers;

use App\Question;
use App\HTTP\Requests\QuestionRequest;

use Auth;

class QuestionController extends Controller
{   


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Question::class, 'question');
    }


    public function index()
    {
        $type = request()->get('type');

        if (request()->get('type'))
            $questions = Question::orderBy('id', 'desc')->whereType($type)->paginate(1);
        else
            $questions = Question::orderBy('id', 'desc')->paginate(1);


        return View('question.index', compact('questions'));

    }


    public function create()
    {

         //$this->authorize('create', Question::class);

         return View('question.create');

    }


    public function store(QuestionRequest $request)
    {

        $question = Question::create($request->all());
        
        toastr()->success('Your question has been saved successfully!');

        return redirect()->route('question.index');

    }


    public function show(Question $question)
    {

        return view('question.show', compact('question'));
        
    }


    public function edit(Question $question)
    {

         return View('question.edit', compact('question'));

    }


    public function update(QuestionRequest $request, Question $question)
    {
         //$this->authorize('update', $question);

         $question->update($request->all());

         toastr()->success('Your question has been updated successfully!');

         return redirect()->route('question.index');

    }


    public function destroy(Question $question)
    {

         $question->delete();

         toastr()->success('Your question has been deleted successfully!');

         return redirect()->route('question.index');
    }

}