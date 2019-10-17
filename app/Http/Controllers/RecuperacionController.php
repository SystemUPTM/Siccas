<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NPreguntaRecuperacion;
use Auth;

class RecuperacionController extends Controller
{

    /**
     * Display a listing of the preguntas.
     *
     * @return \Illuminate\Http\Response
     */
    public function preguntas()
    {
        $preguntas = NPreguntaRecuperacion::all();
        $header = array (
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'
            );

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Recuperacion de contraseña",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return response()->json($preguntas, 200, $header, JSON_UNESCAPED_UNICODE);
    }

}
