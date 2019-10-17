<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BitacoraController extends Controller
{

    /**
     * Bitacora.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $bitacora = \App\UserLog::orderBy('id', 'desc')->paginate(10);

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Consulta bitácora",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return view('direccion_catastro.bitacora')->with('bitacora',$bitacora);
    }

}