<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function index() {
        /**
         * RAW query
         */

        //DB::insert('INSERT INTO users (name, email, password) VALUES (?, ?, ?)', [
            //'Cristo',
            //'cristo@gmail.com',
            //'pass',
        //]);

        //$users = DB::select('SELECT * FROM users');
        //return $users;

        //DB::update('UPDATE users SET name = ? WHERE id = 1', [
            //'Edu',
        //]);

        //DB::delete('DELETE FROM users');

        /**
         * Using Eloquent
         */
        //$user = new User();
        //$user->name = 'Edu';
        //$user->email = 'edu@gmail.com';

        // bcrypt es para encriptar la password
        //$user->password = bcrypt('pass');

        // guarda el usuario en la base de datos
        //$user->save();

        // con eloquent se pueden hacer todas las operaciones sql
        User::where('id', 2)->update(['name' => 'cristo']);

        // para ver todos los usuarios
        $userList = User::all();
        return $userList;

        // dd muestra todos los atributos con un formato legible
        //dd($user);

        //return view('home');
    }
}
