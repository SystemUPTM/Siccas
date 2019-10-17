<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inscripcion;
use App\Documento;
use PDF;
use Session;
use Auth;

class EstadisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search_by_day(Request $request)
    {
        if (isset($request->search)){

            $search = $request->search;
            $inscripcionDb = \App\Inscripcion::where('fecha', $search)->paginate(10);

            $error = false;
            if($inscripcionDb->isEmpty()){
                $error = true;
            }

            if($error){
                Session::flash('error', 'No existen registros en la fecha '.$search);
            \DB::table('user_log')->insert(
            [
                'user_id' => Auth::user()->id,
                'log' => "Estadística/Registros diarios del ".$search." no existen",
                'fecha' => date("Y-m-d H:i:s")
            ]
            );
            }
            else{
                Session::forget('error');

            $inscripciones = [
            	'inscritos' => $inscripcionDb,
            	'fechaConsul' => $request->search
            ];

            \DB::table('user_log')->insert(
            [
                'user_id' => Auth::user()->id,
                'log' => "Estadística/Registros diarios del ".$search,
                'fecha' => date("Y-m-d H:i:s")
            ]
            );
                
            return view('direccion_catastro.estadistica.diaria.index')
                ->with('inscripciones', $inscripciones);
            }
        }
        
        $inscripciones = [
        	'inscritos' => Inscripcion::where('fecha'),
        	'fechaConsul' => $request->search
        ]; 

        return view('direccion_catastro.estadistica.diaria.index')
        ->with('inscripciones', $inscripciones);
    }

    public function search_by_month(Request $request)
    {
        if (isset($request->search)){

            $search = $request->search;
            $inscripcionDb = \App\Inscripcion::whereMonth('fecha', '=', $search)->paginate(10);

            $error = false;
            if($inscripcionDb->isEmpty()){
                $error = true;
            }

            if($error){

            	$valor="";
		        if($search == 01)
		            $valor = "Enero";
		        if($search == 02)
		            $valor = "Febrero";
		        if($search == 03)
		            $valor = "Marzo";
		        if($search == 04)
		            $valor = "Abril";
		        if($search == 05)
		            $valor = "Mayo";
		        if($search == 06)
		            $valor = "Junio";
		        if($search == 07)
		            $valor = "Julio";
		        if($search == '08')
		            $valor = "Agosto";
		        if($search == '09')
		            $valor = "Septiembre";
		        if($search == 10)
		            $valor = "Octubre";
		        if($search == 11)
		            $valor = "Noviembre";
		        if($search == 12)
		            $valor = "Diciembre";

                Session::flash('error', 'No existen registros en el mes '.$valor);

                \DB::table('user_log')->insert(
                [
                'user_id' => Auth::user()->id,
                'log' => "Estadística/Registros mensuales de ".$valor." no existen",
                'fecha' => date("Y-m-d H:i:s")
                ]
                );
            }
            else{
                Session::forget('error');
             
            $inscripciones = [
            	'inscritos' => $inscripcionDb,
            	'mesConsul' => $request->search
            ];

            \DB::table('user_log')->insert(
            [
                'user_id' => Auth::user()->id,
                'log' => "Estadística/Registros mensuales de ".$search,
                'fecha' => date("Y-m-d H:i:s")
            ]
            );

            return view('direccion_catastro.estadistica.mensual.index')
                ->with('inscripciones', $inscripciones);
            }
        }

        $inscripciones = [
        	'inscritos' => Inscripcion::where('fecha'),
        	'mesConsul' => $request->search
        ]; 

        return view('direccion_catastro.estadistica.mensual.index')
        ->with('inscripciones',$inscripciones);
    }

    public function search_by_year(Request $request)
    {
        if (isset($request->search)){

            $search = $request->search;
            $inscripcionDb = \App\Inscripcion::whereYear('fecha', '=', $search)->paginate(10);
            $error = false;

            if($inscripcionDb->isEmpty()){
                $error = true;
            }

            if($error){
                Session::flash('error', 'No existen registros en el año ' .$search);
                \DB::table('user_log')->insert(
                [
                'user_id' => Auth::user()->id,
                'log' => "Estadística/Registros anuales de ".$search." no existen",
                'fecha' => date("Y-m-d H:i:s")
                ]
                );
            }
            else{
                Session::forget('error');
            
            $inscripciones = [
            	'inscritos' => $inscripcionDb,
            	'fechaConsul' => $request->search
            ];

            \DB::table('user_log')->insert(
            [
                'user_id' => Auth::user()->id,
                'log' => "Estadística/Registros anuales de ".$search,
                'fecha' => date("Y-m-d H:i:s")
            ]
            );

            return view('direccion_catastro.estadistica.anual.index')
                ->with('inscripciones', $inscripciones);
            }
        }

        $inscripciones = [
        	'inscritos' => Inscripcion::where('fecha'),
        	'fechaConsul' => $request->search
        ]; 

        return view('direccion_catastro.estadistica.anual.index')
        ->with('inscripciones',$inscripciones);
    }

    public function print_by_day($id)
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
            'title' => 'ESTADISTICA DIARIA',
            'fechaConsulta' => $id,
            'inscripcion' => \App\Inscripcion::where('fecha', $id)->get(),
            'date' => $date,
        ];
        $pdf = PDF::loadView('direccion_catastro.estadistica.diaria.print', $data);
        return $pdf->download('EstadísticaDiaria.pdf');
    }

    public function print_by_month($id)
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

        $mesId = "";
        if($id == 1)
            $mesId = "Enero";
        if($id == 2)
            $mesId = "Febrero";
        if($id == 3)
            $mesId = "Marzo";
        if($id == 4)
            $mesId = "Abril";
        if($id == 5)
            $mesId = "Mayo";
        if($id == 6)
            $mesId = "Junio";
        if($id == 7)
            $mesId = "Julio";
        if($id == 8)
            $mesId = "Agosto";
        if($id == 9)
            $mesId = "Septiembre";
        if($id == 10)
            $mesId = "Octubre";
        if($id == 11)
            $mesId = "Noviembre";
        if($id == 12)
            $mesId = "Diciembre";
        $data = [
            'title' => 'ESTADISTICA MENSUAL',
            'fechaConsulta' => $mesId,
            'inscripcion' => \App\Inscripcion::whereMonth('fecha', '=', $id)->get(),
            'date' => $date,
        ];
        $pdf = PDF::loadView('direccion_catastro.estadistica.mensual.print', $data);
        return $pdf->download('EstadísticaMensual.pdf');
    }

    public function print_by_year($id)
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
            'title' => 'ESTADISTICA ANUAL',
            'fechaConsulta' => $id,
            'inscripcion' => \App\Inscripcion::whereYear('fecha', '=', $id)->get(),
            'date' => $date,
        ];
        $pdf = PDF::loadView('direccion_catastro.estadistica.anual.print', $data);
        return $pdf->download('EstadísticaAnual.pdf');
    }
}