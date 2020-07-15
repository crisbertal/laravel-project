@extends('todos.layout')

@section('content')
    <h1 class="text-2xl">{{$todo->title}}</h1>

    <div>
        <h2 class="py-2 text-xl">{{$todo->description}}</h2>
    </div>

    @if ($todo->steps->count() > 0)
        <div class="py-4">
            <h3 class="text-lg">Steps for this task</h3>
            @foreach ($todo->steps as $step)
                <div class="py-2">
                    <p>{{$step->name}}</p> 
                </div>
            @endforeach
        </div>
    @endif

    <a href=" {{ route('todos.index') }} " class="m-5 p-1 bg-blue-300 cursor-pointer rounded text-white">Back</a>
@endsection