<?php

namespace App\Http\Controllers\GestionInmuebles;

use App\Http\Controllers\Controller;
use App\Propietario;
use Illuminate\Http\Request;
use Auth;

class CalculadosController extends Controller
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
            'log' => "Inmuebles/Cálculo de impuestos",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return view('direccion_catastro.inmuebles.calculado.index')
            ->with('inscripciones', \App\Inscripcion::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('direccion_catastro.inmuebles.calculado.calculate')
            ->with('inscripcion', \App\Inscripcion::find($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->id_propietario && $request->result_3) {
            \DB::table('impuesto_calculado')->insert(
                [
                    'id_propietario' => $request->id_propietario,
                    'cantidad' => $request->result_3,
                ]
            );
            $propietario = $request->id_propietario;
            $name = \App\Propietario::where('id', $propietario)->first()->nombre;

            \DB::table('user_log')->insert(
            [
                'user_id' => Auth::user()->id,
                'log' => "Calcular impuesto del propietario ".$name,
                'fecha' => date("Y-m-d H:i:s")
            ]
            );

            $impuesto_calculado_id = \App\ImpuestoCalculado::orderBy('id', 'desc')->first()->id;
            return redirect()->route('inmuebles.notificacion.create', ['id' => $impuesto_calculado_id]);
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
        //
    }
}
