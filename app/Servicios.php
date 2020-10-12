<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    //
   public $table ='tbl_servicios';
   public $timestamps = false;
    protected $casts = [
        'fecha_inicio' => 'datetime:Y-m-d',
        'fecha_fin'=>'datetime:Y-m-d'
    ];
    protected $fillable = [
        'id','id_cliente','id_tecnico','id_servicio','fecha_inicio','fecha_fin','horas_inicio','horas_fin'
    ];
    
}
