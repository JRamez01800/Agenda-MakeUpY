<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Mail\MailableName;
use Illuminate\Support\Facades\Mail;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['web'])->group(function () {
   
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/registrar', function () {
        return view('register');
    });
    
    
    Route::get('/recuperar', function () {
        return view('recuperar');
    });
    
    Route::get('/index', function () {
        return view('index');
    });

    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/contacto', function () {
        return view('contacto');
    });
    
    Route::get('/calculadora', function () {
        return view('calculadora');
    });

    Route::get('/compras', function () {
        return view('compras');
    });
    
    Route::get('/carrito', function () {
        return view('carrito');
    });

    Route::get('/metpago', function () {
        return view('metpago');
    });

    Route::get('/usuarios', function () {
        return view('usuarios');
    });

    //Antes '/editarUsuario/'
    Route::get('/editarUsuario', function () {
        return view('editar');
    });



    Route::post('/login', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout']);
    //
    Route::get('/terminos',[UserController::class,'mostrarTerminos']);
    
});





