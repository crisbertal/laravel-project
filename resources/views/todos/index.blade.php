@extends('todos.layout')

@section('content')
<div class="flex justify-center border-b pb-3">
    <h1 class="text-2xl">All ToDos</h1>
<a href="{{ route("todos.create") }}" class="mx-5 py-2 text-blue-500 cursor-pointer rounded text-white">
        <span class="fas fa-plus-circle"/>
    </a>
</div>
<ul class="my-5">
    <x-alert />
    @foreach ($todos as $todo)
    <li class="flex justify-between py-2">
        <div>
            @include('todos.complete-button')
        </div>
        @if ($todo->completed)
            <p class="line-through"> {{ $todo->title }} </p>
        @else
            <p> {{ $todo->title }} </p>
        @endif
       <div>
            <a href="{{'/todos/' . $todo->id . '/edit'}}" class="py-1 cursor-pointer rounded" > <span class="fas fa-edit text-orange-400 px-2"/></a>

            <span class="fas fa-trash text-red-400 cursor-pointer px-2" onclick="

                            event.preventDefault();

                            if(confirm('Are you really want to delete?')) {
                                document.getElementById('form-delete-{{$todo->id}}').submit();
                            }
                            
                            "/>
            <!-- Este formulario esta oculto -->
            <form style="display: none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{ route('todos.destroy', $todo->id) }}">
                @csrf
                @method('delete')
            </form>

       </div>
    </li>
    @endforeach
</ul>
@endsection