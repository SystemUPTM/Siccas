<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Spatie\DbDumper\Databases\MySql;
use Session;
use Auth;

class DatabaseController extends Controller
{
    /**
     * Dump the database.
     *
     */
    public function backup()
    {
        MySql::create()
        ->setDbName(\DB::getConfig('database'))
        ->setUserName(\DB::getConfig('username'))
        ->setPassword(\DB::getConfig('password'))
        ->dumpToFile('../dump.sql');

        Session::flash('success', 'La base de datos ha sido respaldada correctamente.');

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Exportar base de datos",
            'fecha' => date("Y-m-d H:i:s")
        ]
        );

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
}
