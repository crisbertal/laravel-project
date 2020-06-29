<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    public function index() {
        // get all the Todo models from database
        $todos = Todo::all();
        // devuelve el archivo blade index y le pasa el contenido de $todos
        return view('todos.index')->with(['todos' => $todos]);
    }

    public function create() {
        // dentro de la carpeta todos en el fichero create
        return view('todos.create');
    }

    public function edit() {
        // dentro de la carpeta todos en el fichero create
        return view('todos.edit');
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
}
