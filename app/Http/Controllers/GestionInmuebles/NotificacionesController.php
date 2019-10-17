<?php

namespace App\Http\Controllers\GestionInmuebles;

use Illuminate\Http\Request;
use App\Propietario;
use App\Http\Controllers\Controller;
use Session;
use Auth;

class NotificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Inmuebles/Notificaciones de impuestos",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return view('direccion_catastro.inmuebles.notificacion.index')
            ->with('notificaciones', \App\NotificacionImpuesto::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $date = @date('Y')."-".@date('m')."-".@date('d');
        $last_nro = 0;
        $last_tomo = 0;
        $notificacion_impuesto = \App\NotificacionImpuesto::orderBy('id', 'desc')->first();
        if ($notificacion_impuesto)
        {
            $last_nro = $notificacion_impuesto->nro;
            $last_tomo = $notificacion_impuesto->tomo;
        }

        $data = [
            'calculado' =>  \App\ImpuestoCalculado::find($id),
            'propietario' => \App\Propietario::find(\App\ImpuestoCalculado::find($id)->id_propietario),
            'date' => $date,
            'last_nro' => $last_nro,
            'last_tomo' => $last_tomo,
            'trimestres' => \App\NTipoTrimestre::all(),
            'tipos' => \App\NTipoImpuesto::all()
        ];
        return view('direccion_catastro.inmuebles.notificacion.create')
            ->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notificacion_impuesto =  \DB::table('notificacion_impuesto')->insert(
            [
                'id_n_tipo_impuesto' => $request->id_n_tipo_impuesto,
                'id_n_tipo_trimestre' => $request->id_n_tipo_trimestre,
                'id_impuesto_calculado' => $request->id_impuesto_calculado,
                'nro' => $request->numero_notificacion,
                'fecha' => $request->fecha,
                'ubicacion' => $request->parroquia.', '.$request->sector.', '.$request->address,
                'tasa_anual' => $request->tasa_anual,
                'tasa_trimestral' => $request->tasa_trimestral,
                'observaciones' => $request->observaciones,
                'tomo' => $request->tomo
            ]
        );
        if ($notificacion_impuesto) {
            Session::flash('success', 'La Notificación de Impuesto ha sido creada satisfactoriamente.');
            return redirect()->route('notificaciones');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\NotificacionImpuesto::findOrFail($id)->delete();
        Session::flash('success', 'La Notificación de Impuesto ha sido eliminada satisfactoriamente.');
        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Inmuebles/Notificaciones de impuestos",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Notificación de impuesto eliminada",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return redirect()->back();
    }
}
