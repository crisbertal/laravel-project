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