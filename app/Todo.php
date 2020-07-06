<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // se tiene que hacer esto para permitir la entrada de datos por eloquent
    protected $fillable = ['title', 'completed'];
}
