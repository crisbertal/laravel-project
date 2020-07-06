@extends('todos.layout')

@section('content')
<div class="flex justify-center border-b pb-3">
    <h1 class="text-2xl">All ToDos</h1>
    <a href="/todos/create" class="mx-5 py-2 text-blue-500 cursor-pointer rounded text-white">
        <span class="fas fa-plus-circle"/>
    </a>
</div>
<ul class="my-5">
    <x-alert />
    @foreach ($todos as $todo)
    <li class="flex justify-between py-2">
        @if ($todo->completed)
            <p class="line-through"> {{ $todo->title }} </p>
        @else
            <p> {{ $todo->title }} </p>
        @endif
       <div>
            <a href="{{'/todos/' . $todo->id . '/edit'}}" class="py-1 cursor-pointer rounded" > <span class="fas fa-edit text-orange-400 px-2"/></a>
            @if ($todo->completed)
                <span class="fas fa-check text-green-400 cursor-pointer px-2" onclick="event.preventDefault();
                                document.getElementById('form-incomplete-{{$todo->id}}')
                                .submit()"/>

                <!-- Este formulario esta oculto -->
                <form style="display: none" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{ route('todo.incomplete', $todo->id) }}">
                    <!-- Yo usaria patch porque solo se quiere cambiar el atributo complete del modelo Todo -->
                    @csrf
                    @method('put')
                </form>
            @else
                <span class="fas fa-check text-gray-300 cursor-pointer px-2" onclick="event.preventDefault();
                                document.getElementById('form-complete-{{$todo->id}}')
                                .submit()"/>

                <!-- Este formulario esta oculto -->
                <form style="display: none" id="{{'form-complete-'.$todo->id}}" method="post" action="{{ route('todo.complete', $todo->id) }}">
                    <!-- Yo usaria patch porque solo se quiere cambiar el atributo complete del modelo Todo -->
                    @csrf
                    @method('put')
                </form>
            @endif
       </div>
    </li>
    @endforeach
</ul>
@endsection