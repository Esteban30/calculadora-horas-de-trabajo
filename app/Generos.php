<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generos extends Model
{
    //
     public $table ='tbl_genero';
    protected $fillable = ['id', 'nombre'];
    public $timestamps = false;
}
