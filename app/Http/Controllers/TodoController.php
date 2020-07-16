<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Esto es otra forma de usar el middleware
     */
    //public function __construct()
    //{
        // si quieres que se aplique a todo menos a una ruta en concreto
        //$this->middleware('auth')->except('index');
    //}

    public function index() {
        // get all the Todo models from database
        //$todos = Todo::all();

        // muestra todos los valores ordenador por el valor especificado. get() es necesario
        // para que se haga la consulta
        // solo muestra aquellos todos del usuario
        $todos = auth()->user()->todos->sortBy('completed');
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

    public function show(Todo $todo) {
        return view('todos.show', ['todo' => $todo]); 
    }


    // ahora se usa un request propio con sus reglas
    public function store(TodoCreateRequest $request) {
        // crea el objeto todo
        $todo = auth()->user()->todos()->create($request->all());

        // chequea si se han insertando steps
        if($request->steps) {
            // ahora se crean los steps correspondientes al todo
            foreach ($request->steps as $step) {
                // al llamar a steps() se establece la relacion hasMany
                $todo->steps()->create(['name' => $step]);
            }
        }

        // deuelve hacia atras para que no se quede la pagina en blanco
        return redirect(route('todos.index'))->with('message', 'Todo Created Successfully');
    }

    public function update(TodoCreateRequest $request, Todo $todo) {
        // haciendo uso del implicit binding se ha cogido el todo con el id que se ha pasado en la ruta
        $todo->update(['title' => $request->title, 'description' => $request->description,]);

        // por si se editan los pasos
        if($request->step) {
            foreach ($request->steps as $step) {
                $step->update(['name' => $step]);
            }
        }
        // en el redirect se puede indicar la ruta a la que se quiera que nos envie
        return redirect(route('todos.index'))->with('message', 'Todo Updated');
    }

    public function complete(Todo $todo) {
        $todo->update(['completed' => true]);
        return redirect(route('todos.index'))->with('message', 'Todo Completed');
    }

    public function incomplete(Todo $todo) {
        $todo->update(['completed' => false]);
        return redirect(route('todos.index'))->with('message', 'Todo changed to Incompleted');
    }

    public function destroy(Todo $todo) {
        // en caso de que haya relacion entre tablas, se debe borrar asi (aunque tambien he visto 
        // que puedes indicar que se borre en cascada)
        $todo->steps->each->delete();
        $todo->delete();
        return redirect(route('todos.index'))->with('message', 'Todo deleted');
    }
}
