<?php

namespace App\Http\Controllers;

use App\Servicios;
use App\Clientes;
use App\Tecnicos;
use App\TipoServicios;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servicios = Servicios::select('tbl_servicios.*','tbl_clientes.nombre as cliente','tbl_tecnicos.nombre as tecnico',
        'tbl_tipo_servicios.nombre as tipo_servicio')
        ->join("tbl_clientes","tbl_servicios.id_cliente","=","tbl_clientes.id")
        ->join("tbl_tecnicos","tbl_servicios.id_tecnico","=","tbl_tecnicos.id")
        ->join("tbl_tipo_servicios","tbl_servicios.id_servicio","=","tbl_tipo_servicios.id")
        ->get();
        
        $cliente = Clientes::all();
        $tecnico = Tecnicos::all();
        $tiposervicio = TipoServicios::all();
        return view('servicios.index',compact('servicios','cliente','tecnico','tiposervicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $servicio = new Servicios();
        $servicio->id_cliente=$request->id_cliente;
        $servicio->id_tecnico=$request->id_tecnico;
        $servicio->id_servicio=$request->id_servicio;
        $servicio->fecha_inicio=$request->fecha_inicio;
        $servicio->fecha_fin=$request->fecha_fin;
        $servicio->horas_inicio=$request->horas_inicio;
        $servicio->horas_fin=$request->horas_fin;
        $servicio->save();

        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $id = $request ->id;
        $servicios = Servicios::find($id);
        return (response()->json($servicios));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $idServicios = $request->id;
     $consultaServicios = Servicios::findOrFail($idServicios);
     return (response()->json($consultaServicios));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $servicio = Servicios::findOrFail($request->id_upd);    
        $servicio->id_cliente=$request->id_cliente_upd;
        $servicio->id_tecnico=$request->id_tecnico_upd;
        $servicio->id_servicio=$request->id_servicios_upd;
        $servicio->fecha_inicio=$request->fecha_inicio_upd;
        $servicio->fecha_fin=$request->fecha_fin_upd;
        $servicio->horas_inicio=$request->horas_inicio_upd;
        $servicio->horas_fin=$request->horas_fin_upd;
    
        $servicio->save();
        
        return redirect('servicios'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Servicios::destroy($id);
        return redirect('servicios');
    }
}
