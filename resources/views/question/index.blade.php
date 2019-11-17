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

                                <a href="{{route('question.show', $question->id)}}" class="btn btn-dark">Show</a>
                                <a href="{{route('question.edit', $question->id)}}" class="btn btn-primary">Edit</a>

                                <form action="{{route('question.destroy', $question->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                
<!--                                 <form>
                                    <button href="{{route('question.destroy', $question->id)}}" class="btn btn-danger">Delete</a>
                                </form>
 -->
                            </div>
                        </div>



                    @endforeach

        <div class="my-4 d-flex justify-content-center">   {{ $questions->links() }} </div>
    </div>
</div>
@endsection
