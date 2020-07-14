<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    // para evitar el error del mass isnertion
    protected $fillable = ['name', 'todo_id'];
}
