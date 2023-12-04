<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CalculadoraController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registrar', [UserController::class, 'registrar']);
Route::get('/getUsuarios', [UserController::class, 'getUsuarios']);
Route::post('/user', [UserController::class, 'getUser']);
//Route::delete('/delete-user/{id}',[UserController::class, 'getUsuarios']);
Route::delete('/deleteUser/{id}',[UserController::class, 'deleteUser']);
Route::post('/update', [UserController::class, 'update']);
Route::post('/recuperarContrasena', [UserController::class, 'recuperarContrasena']);


Route::get('/getCatalog', [ProductosController::class, 'getCatalog']);
Route::get('/topSell', [ProductosController::class, 'topSell']);
Route::get('/lowSell', [ProductosController::class, 'lowSell']);

Route::post('/verificarCarrito', [CarritoController::class, 'verificarCarrito']);
Route::post('/getCarrito', [CarritoController::class, 'getCarrito']);
Route::post('/addToCart', [CarritoController::class, 'addToCart']);
Route::post('/eliminarProducto', [CarritoController::class, 'eliminarProducto']);
Route::post('/finishBuy', [CarritoController::class, 'finishBuy']);

//Rutas de las calculadoraes

Route::post('/suma', [CalculadoraController::class, 'suma']);
Route::post('/resta', [CalculadoraController::class, 'resta']);
Route::post('/multiplicacion', [CalculadoraController::class, 'multiplicacion']);
Route::post('/division', [CalculadoraController::class, 'division']);

