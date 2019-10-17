<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');

    // propietarios routes
    Route::get('/propietario', 'PropietarioController@index')->name('propietario');
    Route::get('/propietario/create', 'PropietarioController@create')->name('propietario/create');
    Route::post('/propietario/store', 'PropietarioController@store')->name('propietario/store');
    Route::get('/propietario/show/{id}', 'PropietarioController@show')->name('propietario.show');
    // Route::post('/propietario/find', 'PropietarioController@find')->name('propietario/find');
    Route::post('/propietarios', 'PropietarioController@index')->name('propietarios');
    Route::get('/propietarios/edit/{id}', 'PropietarioController@edit')->name('propietario.edit');
    Route::post('/propietarios/update/{id}', 'PropietarioController@update')->name('propietario.update');

    Route::group(['middleware' => ['permission:delete']], function () {
        Route::get('/propietario/{id}/destroy', 'PropietarioController@destroy')->name('propietario.destroy');
    });

    // inscripcion routes
    Route::post('/inscripcion/create', 'InscripcionController@store')->name('inscribir');
    Route::get('/inscripciones', 'InscripcionController@index')->name('inscripciones');


    // solicitante routes
    Route::get('/solicitante', 'SolicitanteController@index')->name('solicitante');
    Route::post('/solicitante/create', 'SolicitanteController@store')->name('create_solicitante');

    // inmueble routes
    Route::get('/inmuebles', 'InmuebleController@index')->name('inmuebles');
    Route::get('/inmueble/create', 'InmuebleController@create')->name('inmueble/create');
    Route::post('/inmueble/store', 'InmuebleController@store')->name('inmueble/store');
    Route::get('/inmueble/show/{id}', 'InmuebleController@show')->name('inmueble.show');

    // linderos routes
    Route::get('/linderos', 'LinderosController@index')->name('linderos');
    Route::post('/linderos/create', 'LinderosController@store')->name('create_linderos');

    // documento routes
    Route::get('/documento', 'DocumentController@index')->name('documento');
    Route::post('/documento/create', 'DocumentController@store')->name('create_documento');

    // Gestion de Inmuebles
    // Impuesto Calculado
    Route::get('/impuestos', 'GestionInmuebles\CalculadosController@index')->name('impuestos');
    Route::get('/impuesto/calcular/{id}', 'GestionInmuebles\CalculadosController@create')->name('calculate_impuesto');
    Route::get('/impuesto/store', 'GestionInmuebles\CalculadosController@store')->name('store_calculo_impuesto');
    Route::get('/impuesto/create/{id}', 'GestionInmuebles\CalculadosController@create')->name('impuesto.create');
    // Notificacion Impuesto
    Route::get('/inmuebles/notificacion_impuesto/create/{id}', 'GestionInmuebles\NotificacionesController@create')->name('inmuebles.notificacion.create');
    Route::post('/inmuebles/notificacion_impuesto/store', 'GestionInmuebles\NotificacionesController@store')->name('inmuebles.notificacion.store');
    Route::get('/impuestos/notificaciones', 'GestionInmuebles\NotificacionesController@index')->name('notificaciones');

    Route::group(['middleware' => ['permission:delete']], function () {
        Route::get('/impuestos/notificaciones/{id}/destroy', 'GestionInmuebles\NotificacionesController@destroy')->name('notificacion.destroy');
    });

    // Notificacion Impuesto
    Route::get('/inmuebles/notificacion_impuesto/create/{id}', 'GestionInmuebles\NotificacionesController@create')->name('inmuebles.notificacion.create');
    Route::post('/inmuebles/notificacion_impuesto/store', 'GestionInmuebles\NotificacionesController@store')->name('inmuebles.notificacion.store');
    Route::get('/impuestos/notificaciones', 'GestionInmuebles\NotificacionesController@index')->name('notificaciones');

    Route::group(['middleware' => ['permission:delete']], function () {
        Route::get('/impuestos/notificaciones/{id}/destroy', 'GestionInmuebles\NotificacionesController@destroy')->name('notificacion.destroy');
    });

    //Estadisticas
    //Day routes
    Route::get('/estadisticaDiaria', 'EstadisticaController@search_by_day')->name('estadisticaDiaria');
    Route::post('/estadisticaDiaria_search', 'EstadisticaController@search_by_day')->name('estadisticaDiaria_search');
    Route::get('/estadisticaDiaria/imprimir/{id}', 'EstadisticaController@print_by_day')->name('estadisticaDiaria.imprimir');
    //Month routes
    Route::get('/estadisticaMensual', 'EstadisticaController@search_by_month')->name('estadisticaMensual');
    Route::post('/estadisticaMensual_search', 'EstadisticaController@search_by_month')->name('estadisticaMensual_search');
    Route::get('/estadisticaMensual/imprimir/{id}', 'EstadisticaController@print_by_month')->name('estadisticaMensual.imprimir');
    //Year routes
    Route::get('/estadisticaAnual', 'EstadisticaController@search_by_year')->name('estadisticaAnual');
    Route::post('/estadisticaAnual_search', 'EstadisticaController@search_by_year')->name('estadisticaAnual_search');
    Route::get('/estadisticaAnual/imprimir/{id}', 'EstadisticaController@print_by_year')->name('estadisticaAnual.imprimir');

    // Report routes
    Route::group(['prefix' => 'reportes', 'namespace' => 'Reportes'], function() {
        Route::get('inscripciones', 'InscripcionesReporteController@index')->name('reportes.inscripciones');
        Route::post('inscripciones_search', 'InscripcionesReporteController@index')->name('reportes.inscripciones_search');
        Route::get('inscripciones/imprimir/{id}', 'InscripcionesReporteController@print')->name('reportes.inscripciones.imprimir');
    });
    //Constancias
    Route::group(['prefix' => 'reportes', 'namespace' => 'Reportes'], function() {
        Route::get('constancias', 'ConstanciasReporteController@index')->name('reportes.constancias');
        Route::post('constancias_search', 'ConstanciasReporteController@index')->name('reportes.constancias_search');
        Route::get('constancias/imprimir/{id}', 'ConstanciasReporteController@print')->name('reportes.constancias.imprimir');
    });

    // Direcciones
    Route::group(['prefix' => 'direcciones'], function() {
        Route::get('parroquias', 'DireccionesController@parroquias')->name('direcciones.parroquias');
        Route::get('sectores/{id}', 'DireccionesController@sectores')->name('direcciones.sectores');
    });

    // Preguntas
    Route::group(['prefix' => 'recuperacion_clave'], function() {
        Route::get('preguntas', 'RecuperacionController@preguntas')->name('recuperacion.preguntas');
    });

    // Usuarios
    Route::group(['prefix' => 'users'], function() {
        Route::get('create', 'UsersController@create')->name('users.create');
        Route::post('store', 'UsersController@store')->name('users.store');
    });

    // Database
    Route::group(['prefix' => 'database'], function() {
        Route::get('backup', 'DatabaseController@backup')->name('database.backup');
    });

    // Bitacora
    Route::get('/bitacora', 'BitacoraController@index')->name('bitacora');
});
