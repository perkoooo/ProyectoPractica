<?php

use Illuminate\Support\Facades\Route;
use App\Models\Documento;
use App\Http\Controllers\InformesController;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\DocumentoController;


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
Route::get('/Sistema',[SistemaController::class,'index']);

//Rutas informes
Route::resource('informes','App\Http\Controllers\InformesController');
Route::get('/informes',[InformesController::class,'index']);
Route::post('/obtener-datos', [InformesController::class, 'obtenerDatos'])->name('obtener-datos');
Route::get('/obtener-datos', 'App\Http\Controllers\DocumentoController@obtenerDatos');

//Rutas Documento
Route::resource('documento','App\Http\Controllers\DocumentoController');
Route::get('/documento.index', [DocumentoController::class, 'index'])->name('documento.index');

Route::get('/documento/{DOC_ID}/edit', [DocumentoController::class, 'edit'])->name('documento.edit');
Route::put('/documento/{DOC_ID}', [DocumentoController::class, 'update'])->name('documento.update');
Route::delete('/documento/{DOC_ID}', [DocumentoController::class, 'destroy'])->name('documento.destroy');

//Rutas empresa
Route::resource('empresa','App\Http\Controllers\EmpresaController');

//Rutas region y comuna
Route::resource('region','App\Http\Controllers\RegionController');
Route::resource('comuna','App\Http\Controllers\ComunaController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
