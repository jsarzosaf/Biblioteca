<?php

use App\Http\Controllers\BibliotecaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Ruta para listar los libros activos de la biblioteca
 * 
 * Si se le proporciona el parametro opcional etiqueta y value
 * se indica que se hara una busqueda por etiquetas ambos deben
 * especificar para que de una busqueda exitosa, sino se indica
 * ninguno de los parametros opcionales se retornara todos los 
 * libros disponibles 
 */
Route::get('listar_libros/{etiqueta?}/{value?}', [BibliotecaController::class, 'getLibros']);

/**
 * Ruta para poder prestar un libro, donde se debe especificar los siguiente parametros
 * el identificador del libro (libro_id), la fecha de entrega que devolvera el libro,
 * y el nombre del usuario que registra solicitud y el nombre del usuario solicitante
 */
Route::post('prestar_libro', [BibliotecaController::class, 'registerPrestamo']);

/**
 * Ruta para dar de altas libros en el sistema de la biblioteca, se debe especificar el identificador
 * del libro (libro_id), la cantidad de ejemplares de dar de alta, y el motivo de la alta que puede ser 
 * (migracion, donacion, compra, daño)
 */
Route::post('dar_alta_libro', [BibliotecaController::class, 'addStockLibro']);




