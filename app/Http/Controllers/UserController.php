<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request) {
        // solo funciona con el enctype
        //dd($request->image);

        // almacena la imagen en el filesystem que queramos (se pueden ver en config/filesystems.php)
        //$request->image->store('images', 'public');

        // si se ha seleccionado una imagen
        if ($request->hasFile('image')) {
           User::uploadImage($request->image);

           // se usa el metodo flash de session para que solo se muestre una vez. Si se usara put()
           // el mensaje se mostraria durante la vida de la session
           // $request->session()->flash('message', 'Image Uploaded');

            // este metodo es lo mismo que llamar a session con flash 
            return redirect()->back()->with('message', 'Image Uploaded');
        }

        // en caso de que no se haya subido la imagen
        //$request->session()->flash('error', 'Image Not Uploaded');

        // una vez almacenada la imagen redirige la ruta hacia atras
        //return redirect()->back();
        return redirect()->back()->with('error', 'Image Not Uploaded');

        // muestra en la pantalla el texto
        //return 'uploaded';

        // sirve para asegurar que se ha seleccionado una foto (devuelve boolean)
        //dd($request->hasFile('image'));
    }

    

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
        //User::where('id', 2)->update(['name' => 'cristo']);

        /**
         * Crear usuarios en una linea con encriptacion
         */
        $data = [
            'name' => 'Elon',
            'email' => 'elon@gmail.com',
            'password' => bcrypt('pass'),
        ];
        // solo crea el objeto con los campos que esten dentro de fillable en el modelo (User en este caso)
        //User::create($data);

        // para ver todos los usuarios
        $userList = User::all();
        return $userList;

        // dd muestra todos los atributos con un formato legible
        //dd($user);

        //return view('home');
    }
}
