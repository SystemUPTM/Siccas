<?php

namespace App\Http\Controllers\Reportes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inscripcion;
use App\Documento;
use Auth;
use PDF;
use Session;

class ConstanciasReporteController extends Controller
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
                Session::flash('error', 'No existe la informacion del propietario: '.$search);
                \DB::table('user_log')->insert(
                [
                    'user_id' => Auth::user()->id,
                    'log' => "Reportes/Constancia del propietario ".$search." no existe",
                    'fecha' => date("Y-m-d H:i:s")
                ]
                );
            }
            else{
                Session::forget('error');

                \DB::table('user_log')->insert(
                [
                    'user_id' => Auth::user()->id,
                    'log' => "Reportes/Constancia del propietario con C.I. ".$search,
                    'fecha' => date("Y-m-d H:i:s")
                ]
                );
                return view('direccion_catastro.reportes.constancias.index')
                ->with('inscripciones', $inscripcionDb);
            }
        }

        $inscripciones = Inscripcion::all();

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Reportes/Constancia lista",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return view('direccion_catastro.reportes.constancias.index')
        ->with('inscripciones',$inscripciones);
    }

    //Metodo para imprimir pdf
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
            'title' => 'CONSTANCIA',
            'title2' => 'HAGO CONSTAR',
            'ndirec' => 'Geog. MARIA MILAGRO DAVILA U.',
            'direc' => 'Drectora (E)',
            'inscripcion' => \App\Inscripcion::find($id),
            'date' => $date,
        ];
        $pdf = PDF::loadView('direccion_catastro.reportes.constancias.print', $data);
        return $pdf->download('ConstanciasCatastro.pdf');
    }
}