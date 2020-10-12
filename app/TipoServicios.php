<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicios extends Model
{
    //
   public $table ='tbl_tipo_servicios';
    protected $fillable = [
        'id', 'nombre'
    ];
    public $timestamps = false;
}
