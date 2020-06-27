<?php

namespace App\Http\Controllers;

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
        // muestra los datos del objeto request
        dd($request->all());
    }
}
