<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use Session;
use Auth;

class DocumentController extends Controller
{
    /**
     * Document.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('direccion_catastro.documento');
    }

    public function store(Request $request)
    {
        $documento = new Documento();
        $documento->n_tipo_adjudicacion_id = $request->tipo_adjudicacion;
        $documento->nro_documento = $request->numero_documento;
        $documento->folios = $request->folios_documento;
        $documento->protocolo = $request->protocolo_documento;
        $documento->tomo = $request->tomo_documento;
        $documento->trimestre = $request->trimestre_documento;
        $documento->fecha = $request->fecha_documento;
        $documento->area_total = $request->area_documento;
        $documento->valor_total = $request->valor_documento;
        $documento->observacion = $request->observacion_documento;

        Session::get('Inscription')->documento = $documento;

        // inserts into database
        // propietario
        /*
        \DB::table('propietario')->insert(
            [
                'nombre' => Session::get('Inscription')->propietario->nombre,
                'apellido' => Session::get('Inscription')->propietario->apellido,
                'cedula' => Session::get('Inscription')->propietario->cedula,
                'n_tipo_nacionalidad' => Session::get('Inscription')->propietario->nTipoNacionalidad->id,
                'rif' => Session::get('Inscription')->propietario->rif,
                'n_tipo_rif' => Session::get('Inscription')->propietario->nTipoRif->id,
                'direccion' => Session::get('Inscription')->propietario->direccion
            ]
        );
        */
        // solicitante
        \DB::table('solicitante')->insert(
            [
                'nombre' => Session::get('Inscription')->solicitante->nombre,
                'apellido' => Session::get('Inscription')->solicitante->apellido,
                'cedula' => Session::get('Inscription')->solicitante->cedula,
                'n_tipo_nacionalidad' => Session::get('Inscription')->solicitante->nTipoNacionalidad->id,
                'direccion' => Session::get('Inscription')->solicitante->direccion
            ]
        );
        // inmueble
        \DB::table('inmueble')->insert(
            [
                'ubicacion' => Session::get('Inscription')->inmueble->ubicacion,
                'area' => Session::get('Inscription')->inmueble->area,
                'valor' => Session::get('Inscription')->inmueble->valor
            ]
        );
        // linderos
        /*
        \DB::table('linderos')->insert(
            [
                'frente' => Session::get('Inscription')->linderos->frente,
                'fondo' => Session::get('Inscription')->linderos->fondo,
                'ld' => Session::get('Inscription')->linderos->ld,
                'li' => Session::get('Inscription')->linderos->li
            ]
        );
        */
        // documento
        \DB::table('documento')->insert(
            [
                'n_tipo_adjudicacion_id' => $request->tipo_adjudicacion,
                'nro_documento' => $request->numero_documento,
                'folios' => $request->folios_documento,
                'protocolo' => $request->protocolo_documento,
                'tomo' => $request->tomo_documento,
                'trimestre' => $request->trimestre_documento,
                'fecha' => $request->fecha_documento,
                'area_total' => $request->area_documento,
                'valor_total' => $request->valor_documento,
                'observacion' => $request->observacion_documento
            ]
        );
        $inscripcion = new \App\Inscripcion;
        $inscripcion->ni = \App\Inscripcion::count() + 1;
        $inscripcion->fecha = date("Y-m-d H:i:s");
        // $inscripcion->sector = $request->sector;
        $inscripcion->sector = "Molino";

        \DB::table('inscripcion')->insert(
            [
                'ni' => \App\Inscripcion::count() + 1,
                'fecha' => date("Y-m-d H:i:s"),
                'sector' => $inscripcion->sector,
                'id_propietario' => \App\Propietario::orderBy('id', 'desc')->first()->id,
                'id_solicitante' => \App\Solicitante::orderBy('id', 'desc')->first()->id,
                'id_inmueble' => \App\Inmueble::orderBy('id', 'desc')->first()->id,
                'id_linderos' => \App\Linderos::orderBy('id', 'desc')->first()->id,
                'id_documento' => \App\Documento::orderBy('id', 'desc')->first()->id
            ]
        );

        Session::put('Inscription', "");

        Session::flash('success', 'La Inscripción ha sido creada satisfactoriamente.');

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Registro de documento",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return redirect()->route('home');
    }
}
