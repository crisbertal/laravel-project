<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutators, cambia el valor cuando se asigna (se guarda en la bd cambiado).
     * Se suele usar para cambiar los valores que se obtienen de un formulario (
     * como encriptar la contrasena)
     */
    //public function setPasswordAttribute($password) {
        //$this->attributes['password'] = bcrypt($password);
    //}

    /**
     * Accessors, solo se modifica cuando se recoge de la bd (no cambia en la bd)
     */
    //public function getNameAttribute($name) {
        //return 'My name is: ' . ucfirst($name);
    //}
    
    public static function uploadImage($image) {
        // a traves del objeto imagen se pueden seleccionar para mostrar los datos que quieras.
            // en este caso el nombre del fichero
            $filename = $image->getClientOriginalName();

            // llama a la funcion para eliminar la foto de usuario en caso de que tenga una.
            // el new self() se ha tenido que poner para que el metodo pueda ser estatico y se llame
            // desde el controlador sin necesidad de crear un objeto usuario
            (new self())->deleteOldImage();

            // guarda la imagen en el filesystem public con el nombre especificado en $filename
            $image->storeAs('images', $filename, 'public');

            // busca el user con el id 1 y cambia el valor del campo avatar en la BD
            //User::find(1)->update(['avatar' => 'asdfsd']);

            // En este caso se va a almacenar el nombre del fichero que se ha subido del usuario con id 1
            //User::find(1)->update(['avatar' => $filename]);

            // Para usar el usuario actual se usa auth. Funciona aunque marque como error... Cambia la foto al 
            // nombre del fichero correspondiente al que tiene el user
            auth()->user()->update(['avatar' => $filename]);
    }

    protected function deleteOldImage() {
        // si el usuario ya tiene una imagen de perfil
        if ($this->avatar) {
            // que elimine la imagen previa
            Storage::delete('/public/images/' . $this->avatar);
        }
    }

}
