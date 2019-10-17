<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use Session;
use Auth;

class InmuebleController extends Controller
{
    /**
     * Inmueble.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inmuebles = Inmueble::all();

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Consultar/Inmueble lista",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );

        return view('direccion_catastro.consultar.inmuebles')->
            with('inmuebles',$inmuebles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('direccion_catastro.inmueble');
    }

    public function store(Request $request)
    {
        $inmueble = new Inmueble();
        $inmueble->ubicacion = $request->parroquia.', '.$request->sector.', '.$request->ubicacion_inmueble;
        $inmueble->area = $request->area_inmueble;
        $inmueble->valor = $request->valor_inmueble;

        Session::get('Inscription')->inmueble = $inmueble;

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Registro de inmueble",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );

        return view('direccion_catastro.linderos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Consultar/Inmueble ver detalles",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return view('direccion_catastro.consultar.inmueble')
        ->with('inmueble', \App\Inmueble::find($id));
    }
}
