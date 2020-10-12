<?php

namespace App\Http\Controllers;

use App\Tecnicos;
use App\Generos;
use Illuminate\Http\Request;

class TecnicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tecnicos = Tecnicos::select('tbl_tecnicos.*','tbl_genero.nombre as genero')
        ->join("tbl_genero","tbl_tecnicos.id_genero","=","tbl_genero.id")
        ->get();

        $generos = Generos::all();
        return view('servicios.tecnicos',compact('tecnicos','generos'));
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
        $grupo = new Tecnicos();
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
     * @param  \App\Tecnicos  $tecnicos
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
        //
        $id = $request ->id;
        $tecnicos = Tecnicos::find($id);
        return (response()->json($tecnicos));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tecnicos  $tecnicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $idTecnico = $request->id;
        $consultaTecnico = Tecnicos::findOrFail($idTecnico);
        return (response()->json($consultaTecnico));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tecnicos  $tecnicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $grupo = Tecnicos::findOrFail($request->id_upd);    
        $grupo->nombre = $request->nombre_upd;
        $grupo->apellido = $request->apellido_upd;
        $grupo->identificacion = $request->identificacion_upd;
        $grupo->id_genero = $request->id_genero_upd; 
        $grupo->telefono = $request->telefono_upd; 
    
        $grupo->save();
        
        return redirect('tecnicos');  


       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tecnicos  $tecnicos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Tecnicos::destroy($id);
        return redirect('tecnicos');
    }
}
