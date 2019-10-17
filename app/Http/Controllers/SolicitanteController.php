<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitante;
use Session;
use Auth;

class SolicitanteController extends Controller
{
    /**
     * Solicitante.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('direccion_catastro.solicitante');
    }

    public function store(Request $request)
    {
        $solicitante = new Solicitante();
        $solicitante->nombre = $request->name_solicitante;
        $solicitante->apellido = $request->last_name_solicitante;
        $solicitante->cedula = $request->cedula_solicitante;
        $solicitante->nTipoNacionalidad = \App\NTipoNacionalidad::find($request->nationality_solicitante);
        $solicitante->direccion = $request->parroquia.', '.$request->sector.', '.$request->address_solicitante;

        // dd($request->request, $solicitante);

        Session::get('Inscription')->solicitante = $solicitante;

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Registro de solicitante ",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );

        return view('direccion_catastro.inmueble');
    }
}
