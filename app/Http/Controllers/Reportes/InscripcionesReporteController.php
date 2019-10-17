<?php

namespace App\Http\Controllers\Reportes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inscripcion;
use PDF;
use Session;
use Auth;

class InscripcionesReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->search)){

            $search = $request->search;
            $propietarioDb = \DB::table('propietario')
            ->whereRaw('cedula = '.$search)
            ->get();

            $error = false;
            if ($propietarioDb->isEmpty()){
                $propietarioDb = \DB::table('propietario')
                    ->whereRaw('rif = '.$search)
                    ->get();
                if($propietarioDb->isEmpty()){
                    $error = true;
                } else {
                    $inscripcionDb = \App\Inscripcion::where('id_propietario',$propietarioDb[0]->id)
                    ->paginate(10);
                    if($inscripcionDb->isEmpty()){
                        $error = true;
                    }
                }
            } else {
                $inscripcionDb = \App\Inscripcion::where('id_propietario',$propietarioDb[0]->id)
                ->paginate(10);
                if($inscripcionDb->isEmpty()){
                    $error = true;
                }
            }

            if($error){
                Session::flash('error', 'No existe la inscripción con el propietario: '.$search);
                
                \DB::table('user_log')->insert(
                [
                    'user_id' => Auth::user()->id,
                    'log' => "Reportes/Inscripción catastral del propietario ".$search." no existe",
                    'fecha' => date("Y-m-d H:i:s")
                ]
                );
            }
            else{
                Session::forget('error');

                \DB::table('user_log')->insert(
                [
                    'user_id' => Auth::user()->id,
                    'log' => "Reportes/Inscripción catastral del propietario con C.I. ".$search,
                    'fecha' => date("Y-m-d H:i:s")
                ]
                );
                return view('direccion_catastro.reportes.inscripciones.index')
                ->with('inscripciones', $inscripcionDb);
            }
        }

        $inscripciones = Inscripcion::all();

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Reportes/Inscrpción catastral lista",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );

        return view('direccion_catastro.reportes.inscripciones.index')
        ->with('inscripciones',$inscripciones);
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

    /**
     * Print Inscripcion.
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {

        $month = "";
        if(@date('m') == 1)
            $month = "Enero";
        if(@date('m') == 2)
            $month = "Febrero";
        if(@date('m') == 3)
            $month = "Marzo";
        if(@date('m') == 4)
            $month = "Abril";
        if(@date('m') == 5)
            $month = "Mayo";
        if(@date('m') == 6)
            $month = "Junio";
        if(@date('m') == 7)
            $month = "Julio";
        if(@date('m') == 8)
            $month = "Agosto";
        if(@date('m') == 9)
            $month = "Septiembre";
        if(@date('m') == 10)
            $month = "Octubre";
        if(@date('m') == 11)
            $month = "Noviembre";
        if(@date('m') == 12)
            $month = "Diciembre";
        $date = @date('d')." de ".$month." de ".@date('Y');
        $data = [
            'title' => 'PLANILLA DE INSCRIPCIÓN CATASTRAL',
            'inscripcion' => \App\Inscripcion::find($id),
            'date' => $date,
        ];
        $pdf = PDF::loadView('direccion_catastro.reportes.inscripciones.print', $data);
        return $pdf->download('InscripcionCatastro.pdf');
    }
}
