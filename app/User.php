<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
}
