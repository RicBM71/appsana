<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    protected $fillable = [
        'titulo','linea1','linea2','linea3','username'
    ];
}
