<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnicos extends Model
{
    //

    public $table ='tbl_tecnicos';
    protected $fillable = [
        'id', 'nombre', 'apellido', 'identificacion','id_genero','telefono'
    ];
    public $timestamps = false;
}
