<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;


class QuestionController extends Controller
{   

    public function index()
    {

        $questions = Question::orderBy('id', 'desc')->paginate(10);

        return View('question.index', compact('questions'));

    }


    public function create()
    {

         return View('question.create');

    }


    public function store(Request $request)
    {

        $question = Question::create($request->all());
        
        toastr()->success('Your question has been saved successfully!');

        return redirect()->route('question.index');

    }


    public function show(Question $question)
    {
        //
    }


    public function edit(Question $question)
    {

         return View('question.edit', compact('question'));

    }


    public function update(Request $request, Question $question)
    {

         $question->update($request->all());

         toastr()->success('Your question has been updated successfully!');

         return redirect()->route('question.index');

    }


    public function destroy(Question $question)
    {
        //
    }

}