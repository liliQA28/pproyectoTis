<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

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
    return view('auth.login');
});

/*Route::get('/empresa', function () {
    return view('empresa.index');
});

Route::get('/empresa/create',[EmpresaController::class, 'create']);*/

Route::resource('/empresa', EmpresaController::class)->middleware('auth');

Auth::routes(['register'=>true, 'reset'=>true]);

Route::get('/home', [EmpresaController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function () {
Route::get('/', [EmpresaController::class, 'index'])->name('home');

    
});
