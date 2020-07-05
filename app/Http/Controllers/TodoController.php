<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    public function index() {
        // get all the Todo models from database
        //$todos = Todo::all();

        // muestra todos los valores ordenador por el valor especificado. get() es necesario
        // para que se haga la consulta
        $todos = Todo::orderBy('completed', 'asc')->get();
        // devuelve el archivo blade index y le pasa el contenido de $todos
        return view('todos.index')->with(['todos' => $todos]);
    }

    public function create() {
        // dentro de la carpeta todos en el fichero create
        return view('todos.create');
    }

    /**
     * Permite editar la nota. Se pasa el valor del id de la nota
     * para poder recogerla de la BD
     */
    public function edit(Todo $todo) {
        // Busca en la BD correspondiente a la entidad Todo el valor
        // de la primary key
        //$todo = Todo::find($id);

        // dentro de la carpeta todos en el fichero create. 
        return view('todos.edit', ['todo' => $todo]);
    }

    // ahora se usa un request propio con sus reglas
    public function store(TodoCreateRequest $request) {
        /*
            validacion de campos
        */
        //$request->validate([
            // obligatorio y con longitud inferior a 255 char
            //'title' => 'required|max:255',
        //]);

        /*
            otra forma de validar
        */
        //$rules = [
            //'title' => 'required|max:255',
        //];

        //$messages = [
            //'title.max' => 'Todo title should not be greater than 255 chars',
        //];

        //$validator = Validator::make($request->all(), $rules, $messages);

        //if ($validator->fails()) {
            //return redirect()->back()->withErrors($validator)->withInput();
        //}

        Todo::create($request->all());
        // deuelve hacia atras para que no se quede la pagina en blanco
        return redirect()->back()->with('message', 'Todo Created Successfully');
    }

    public function update(TodoCreateRequest $request, Todo $todo) {
        // haciendo uso del implicit binding se ha cogido el todo con el id que se ha pasado en la ruta
        $todo->update(['title' => $request->title]);
        // en el redirect se puede indicar la ruta a la que se quiera que nos envie
        return redirect(route('todo.index'))->with('message', 'Todo Updated');
    }
}
