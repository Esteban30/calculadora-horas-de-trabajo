<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Generos;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $cliente = Clientes::select('tbl_clientes.*','tbl_genero.nombre as genero')
        ->join("tbl_genero","tbl_clientes.id_genero","=","tbl_genero.id")
        ->get();

        $generos = Generos::all();
        return view('servicios.clientes',compact('cliente','generos'));
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
        //

        $grupo = new Clientes();
        $grupo->nombre=$request->nombre;
        $grupo->apellido=$request->apellido;
        $grupo->identificacion=$request->identificacion;
        $grupo->id_genero=$request->id_genero;
        $grupo->telefono=$request->telefono;
        $grupo->save();

        return redirect() -> back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
        //
        $id = $request ->id;
        $clientes = Clientes::find($id);
        return (response()->json($clientes));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientess  $clientess
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {
        //
        $idCliente = $request->id;
     $consultaCliente = Clientes::findOrFail($idCliente);
     return (response()->json($consultaCliente));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientess  $clientess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $grupo = Clientes::findOrFail($request->id_upd);    
        $grupo->nombre = $request->nombre_upd;
        $grupo->apellido = $request->apellido_upd;
        $grupo->identificacion = $request->identificacion_upd;
        $grupo->id_genero = $request->id_genero_upd; 
        $grupo->telefono = $request->telefono_upd; 
    
        $grupo->save();
        
        return redirect('clientes');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientess  $clientess
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //

        Clientes::destroy($id);
        return redirect('clientes');
    }
}
