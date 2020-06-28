<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create() {
        // dentro de la carpeta todos en el fichero create
        return view('todos.create');
    }

    public function edit() {
        // dentro de la carpeta todos en el fichero create
        return view('todos.edit');
    }

    public function store(Request $request) {
        Todo::create($request->all());
        // deuelve hacia atras para que no se quede la pagina en blanco
        return redirect()->back()->with('message', 'Todo Created Successfully');
    }
}
