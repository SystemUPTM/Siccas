<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscripcionController extends Controller
{

    /**
     * Propietario.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Módulo inscripción",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return view('direccion_catastro.inscripciones/index')
            ->with('inscripciones', \App\Inscripcion::all());
    }

    public function store(Request $request)
    {
        //
    }

}
