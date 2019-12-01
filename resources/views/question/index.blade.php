@extends('layouts.app')

@section('content')
<div class="container">

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Type
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{route('question.index')}}">All</a>
        <a class="dropdown-item" href="{{route('question.index', ['type' => 'mcq-multi-select'])}}">Multi-select MCQs</a>
        <a class="dropdown-item" href="{{route('question.index', ['type' => 'mcq-single-select'])}}">Single-select MCQs</a>
        <a class="dropdown-item" href="{{route('question.index', ['type' => 'fill-in-the-blank'])}}">Fill in the blanks</a>
      </div>
    </div>


    <div class="row justify-content-center">

        <div class="col-md-8">

                    @foreach ($questions as $question)

                        <div class="card my-3">
                            <div class="card-body">
                                <a href="{{route('question.show', $question)}}"> <strong> Question ID:  {{ $question->id }} </strong></a> 

                                <hr>
                                
                                <h3>{{ $question->body }}</h3>
                                
                                <p>
                                    @if($question->user()->exists())
                                        Added by: {{$question->user->name}} | {{$question->user->email}} |
                                    @endif

                                    Type: {{$question->type}}
                                </p>

                                <div class="row justify-content-end">

                                    <div class="mx-1">
                                        <a href="{{route('question.show', $question->id)}}" class="btn btn-dark">Show</a>
                                    </div>

                                    
                                    @can('update', $question)
                                    <div class="mx-1">
                                        <a href="{{route('question.edit', $question->id)}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    @endcan 

                                   
                                    <div class="mx-1">
                                        <form action="{{route('question.destroy', $question->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                               
                               </div>
                                
                            </div>
                        </div>



                    @endforeach

        <div class="my-4 d-flex justify-content-center">   {{ $questions->links() }} </div>
    </div>
</div>
@endsection
