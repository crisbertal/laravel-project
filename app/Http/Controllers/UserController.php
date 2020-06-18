<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('home');
    }
}
