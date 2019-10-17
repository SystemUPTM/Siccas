<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

use Spatie\Permission\Models\Role;
use App\User;
use App\NPreguntaRecuperacion;
use App\ItemRecuperacion;

class UsersController extends Controller
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
        $roles = Role::all();

        return view('users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'respuesta1' => 'required|string|min:3',
            'respuesta2' => 'required|string|min:3',
        ]);

        $pregunta1Db= $form = NPreguntaRecuperacion::where('pregunta',
            $request['pregunta1'])->firstOrFail();
        $pregunta2Db= $form = NPreguntaRecuperacion::where('pregunta',
            $request['pregunta2'])->firstOrFail();

        $userCreated = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $userCreated->assignRole($request['roles']);
        
        ItemRecuperacion::create([
            'pregunta_id' => $pregunta1Db->id,
            'respuesta' => $request->respuesta1,
            'user_id' => $userCreated->id
        ]);

        ItemRecuperacion::create([
            'pregunta_id' => $pregunta2Db->id,
            'respuesta' => $request->respuesta2,
            'user_id' => $userCreated->id
        ]);
        Session::flash('success', 'El usuario '.$userCreated->name.' ha sido creado satisfactoriamente.');

        \DB::table('user_log')->insert(
        [
            'user_id' => Auth::user()->id,
            'log' => "Creación de usuario ".$userCreated->name,
            'fecha' => date("Y-m-d H:i:s")
        ]
        );
        return redirect()->route('home');
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
