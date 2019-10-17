<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NParroquia;

class DireccionesController extends Controller
{

    /**
     * Display a listing of the parroquias.
     *
     * @return \Illuminate\Http\Response
     */
    public function parroquias()
    {
        $parroquias = NParroquia::all();
        return json_encode($parroquias);
    }

    /**
     * Display a listing of the sectores by parroquia id.
     *
     * @return \Illuminate\Http\Response
     */
    public function sectores($idParroquia)
    {
        $sectores = \DB::table('n_sector')
        ->whereRaw('parroquia_id = '.$idParroquia)
        ->get();
        return json_encode($sectores);
    }

}
