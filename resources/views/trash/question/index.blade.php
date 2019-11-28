@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                    @foreach ($questions as $question)

                        <div class="card my-2">
                            <div class="card-body">
                                <p>Question ID:  {{ $question->id }}</p><br>
                                <p>{{ $question->body }}</p>
                                
                                @if($question->user()->exists())
                                    <p>Added by: {{$question->user->name}} | {{$question->user->email}}</p>
                                @endif
                                
                                <a href="{{route('question.show', $question->id)}}" class="btn btn-dark">Show</a>
                                
                                <form action="{{route('trashed.question.restore', $question->id)}}" method="POST">
                                   
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Restore</button>
                                </form>
                                
                            </div>
                        </div>



                    @endforeach

        <div class="my-4 d-flex justify-content-center">   {{ $questions->links() }} </div>
    </div>
</div>
@endsection
