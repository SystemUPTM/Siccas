<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propietario;
use App\Inscripcion;
use Session;
use Auth;

class PropietarioController extends Controller
{
    /**
     * Propietario.
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
                }
            }
            if($error){
                Session::flash('error', 'No existe el propietario: '.$search);
                \DB::table('user_log')->insert(
                [
                    'user_id' => Auth::user()->id,
                    'log' => "Consultar/Propietario ".$search." no existe",
                    'fecha' => date("Y-m-d H:i:s")
                ]
                );
            }
            else{
                Session::forget('error');

                \DB::table('user_log')->insert(
                [
                    'user_id' => Auth::user()->id,
                    'log' => "Consultar/Propietario con C.I. ".$search,
                    'fecha' => date("Y-m-d H:i:s")
                ]
                );
            return view('direccion_catastro.consultar.propietarios')
            ->with('propietarios', $propietarioDb);
        }
        }

        $propietarios=Propietario::all();

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Consultar/Propietario lista",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return view('direccion_catastro.consultar.propietarios')
        ->with('propietarios',$propietarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('direccion_catastro.propietario');
    }

    public function store(Request $request)
    {
        $inscription = new Inscripcion();
        $propietario = new Propietario();

        $propietario->nombre = $request->name;
        $propietario->apellido = $request->last_name;
        $propietario->cedula = $request->cedula;
        $propietario->genero = $request->genero;
        $propietario->vivienda = $request->vivienda;
        $propietario->nTipoNacionalidad = \App\NTipoNacionalidad::find($request->nacionalidad);
        $propietario->rif = $request->rif;
        $propietario->nTipoRif = \App\NTipoRif::find($request->rif_tipo);
        $propietario->rif_numero = $request->rif_numero;
        $propietario->direccion = $request->parroquia.', '.$request->sector.', '.$request->address;
        $inscription->propietario = $propietario;

        Session::put('Inscription', $inscription);

        \DB::table('propietario')->insert(
            [
                'nombre' => Session::get('Inscription')->propietario->nombre,
                'apellido' => Session::get('Inscription')->propietario->apellido,
                'cedula' => Session::get('Inscription')->propietario->cedula,
                'genero' => Session::get('Inscription')->propietario->genero,
                'vivienda' => Session::get('Inscription')->propietario->vivienda,
                'n_tipo_nacionalidad' => Session::get('Inscription')->propietario->nTipoNacionalidad->id,
                'rif' => Session::get('Inscription')->propietario->rif,
                'n_tipo_rif' => Session::get('Inscription')->propietario->nTipoRif->id,
                'rif_numero' => Session::get('Inscription')->propietario->rif_numero,
                'direccion' => Session::get('Inscription')->propietario->direccion
            ]
        );

            $propietario = $request->name;
            $name = \App\Propietario::where('nombre', $propietario)->first()->nombre;
        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Registro de propietario ".$name,
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return view('direccion_catastro.solicitante');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $name = \App\Propietario::where('id', $id)->first()->nombre;
        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Consultar/Propietario ".$name." ver detalles",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return view('direccion_catastro.consultar.propietario')
        ->with('propietario', \App\Propietario::find($id));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propietario = Propietario::find($id);

        return view('direccion_catastro.propietarios.edit')->with('propietario', $propietario);
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
        $propietario = Propietario::find($id);

        $propietario->nombre = $request->name;
        $propietario->apellido = $request->last_name;
        $propietario->cedula = $request->cedula;
        $propietario->genero = $request->genero;
        $propietario->nTipoNacionalidad = \App\NTipoNacionalidad::find($request->nacionalidad);
        $propietario->rif = $request->rif;
        $propietario->nTipoRif = \App\NTipoRif::find($request->rif_tipo);
        $propietario->rif_numero = $request->rif_numero;
        $propietario->direccion = $request->address;

        \DB::table('propietario')->update(
            [
                'nombre' => $propietario->nombre,
                'apellido' => $propietario->apellido,
                'cedula' => $propietario->cedula,
                'genero' => $propietario->genero,
                'n_tipo_nacionalidad' => $propietario->nTipoNacionalidad->id,
                'rif' => $propietario->rif,
                'n_tipo_rif' => $propietario->nTipoRif->id,
                'rif_numero' => $propietario->rif_numero,
                'direccion' => $propietario->direccion
            ]
        );

        $name = \App\Propietario::where('id', $id)->first()->nombre;
        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Consultar/Propietario ".$name." actualizado",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );


        // $propietario->save();

        return redirect()->route('propietario');
    }


    /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        \App\Propietario::findOrFail($id)->delete();

        return redirect()->back();
    }
}
