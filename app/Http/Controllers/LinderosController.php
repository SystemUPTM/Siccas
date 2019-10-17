<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Linderos;
use Session;
use Auth;

class LinderosController extends Controller
{
    /**
     * Linderos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('direccion_catastro.linderos');
    }

    public function store(Request $request)
    {
        $linderos = new Linderos();
        $linderos->frente = $request->frente_linderos;
        $linderos->fondo = $request->fondo_linderos;
        $linderos->ld = $request->ld_linderos;
        $linderos->unidad_medida_ld = $request->unidad_medida_ld;
        $linderos->li = $request->li_linderos;
        $linderos->unidad_medida_li = $request->unidad_medida_li;

        // dd($linderos);

        \DB::table('linderos')->insert(
            [
                'frente' => $request->frente_linderos,
                'fondo' => $request->fondo_linderos,
                'ld' => $request->ld_linderos,
                'unidad_medida_ld' => $request->unidad_medida_ld,
                'li' => $request->li_linderos,
                'unidad_medida_li' => $request->unidad_medida_li
            ]
        );

        Session::get('Inscription')->linderos = $linderos;

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Registro de linderos",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );


        return view('direccion_catastro.documento');
    }
}
