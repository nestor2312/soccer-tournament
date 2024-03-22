<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\EliminatoriasController;
use App\Http\Controllers\EquipoController;
// use App\Http\Controllers\filtro_GroupController;
use App\Http\Controllers\GoleadoresController;
use App\Http\Controllers\GolesController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Home_userController;
use App\Http\Controllers\Homeassist_userController;
use App\Http\Controllers\Homegols_userController;
use App\Http\Controllers\HomeMatches_userController;
use App\Http\Controllers\HomeTable_userController;
use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\PartidosController;
use App\Http\Controllers\TablaController;
use App\Http\Controllers\Team_GroupController;
use App\Http\Controllers\Team_playerController;
use App\Http\Controllers\HomePlayers_userController;
use App\Http\Controllers\HomeTeams_UserController;

use App\Http\Controllers\CategoriaController;
// use App\Http\Controllers\HomeTable_userController;Ç
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// Route::get('/categoria/{categoria_id}/inicio', 'CategoriaController@inicio')->name('categoria.inicio');
Route::get('/categoria/{categoria_id}/inicio', [CategoriaController::class, 'inicio'])->name('categoria.inicio');


Route::get('/categoria/{categoria_id}/partidos', [CategoriaController::class, 'partidos'])->name('categoria.partidos');
Route::get('/categoria/{categoria_id}/equipos', [CategoriaController::class, 'equipos'])->name('categoria.equipos');
Route::get('/categoria/{categoria_id}/jugadores', [CategoriaController::class, 'jugadores'])->name('categoria.jugadores');

Route::get('/eliminatoriasprueba', function () {
    return view('eliminatoriasprueba');
});



Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
//equipos
Route::resource('equipos', EquipoController::class);
// Route::get('/grupos/{grupo}/equipos',[EquipoController::class,'index']);
//partidos
Route::resource('partidos', PartidosController::class);
//equipos
Route::resource('eliminatorias', EliminatoriasController::class);
Route::get('/eliminatorias/reset/{id}', [App\Http\Controllers\EliminatoriasController::class, 'reset'])->name('eliminatorias.reset');

//eliminatorias
Route::resource('tabla', TablaController::class);
//grupos
Route::resource('grupos', GroupController::class);
//jugadores
Route::resource('jugadores', JugadoresController::class);
//jugadores x equipo
Route::get('/equipos/{equipo}/jugadores',[Team_playerController::class,'index']);
//equipos x grupo
Route::get('/grupos/{grupo}/equipos',[Team_GroupController::class,'index']);
//equipos
// Route::get('tablagrupo',[filtro_GroupController::class,'index']);
//goles
Route::resource('goles', GolesController::class);
//goleadores
Route::get('goleadores',[GoleadoresController::class,'index']);
//asistencia
Route::resource('asistencia', AsistenciaController::class);
//asistencias
Route::get('asistencias',[AsistenciasController::class,'index']);
//home usuario
Route::get('inicio',[Home_userController::class,'index']);
Route::get('matches',[HomeMatches_userController::class,'index']);
Route::get('/group/{grupo}/teams',[HomeTable_userController::class,'index']);
Route::get('estadisticas',[Homegols_userController::class,'index']);


Route::get('table',[HomeTable_userController::class,'index']);

Route::get('/user/{id}', [HomePlayers_userController::class, 'show'])->name('user.show');


// Route::get('/user/{id}', 'HomePlayers_userControllerr@show');
// Route::get('/eliminatoriasprueba', 'EliminatoriaspruebaController@index');
// Route::get('/eliminatoriasprueba', function () {
//     return view('eliminatoriasprueba');
// });
// Route::get('eliminatoriasprueba',[EliminatoriaspruebaController::class,'index']);
Route::get('players',[HomePlayers_userController::class,'index']);
Route::get('/team/{equipo?}/players',[HomePlayers_userController::class,'index']);
Route::get('teams',[HomeTeams_UserController::class,'index']);
// Route::get('/team/{equipo}/player',[HomePlayers_userController::class,'index']);Çtable