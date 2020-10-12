<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //
    public $table ='tbl_clientes';
    protected $fillable = [
        'id', 'nombre', 'apellido', 'identificacion','id_genero','telefono'
    ];
    public $timestamps = false;
}
