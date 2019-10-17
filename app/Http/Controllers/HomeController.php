<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Inicio del sistema ",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return view('home');
    }
}
