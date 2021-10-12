<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PlanetController;
use App\Models\People;
use App\Models\Vehicle;

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

Route::group([
	'middleware' => 'api',
	'prefix' => 'auth'

], function ($router) {
	Route::post('/login', [AuthController::class, 'login']);
	Route::post('/register', [AuthController::class, 'register']);
	Route::post('/logout', [AuthController::class, 'logout']);
	Route::post('/refresh', [AuthController::class, 'refresh']);
	Route::get('/user-profile', [AuthController::class, 'userProfile']);

	Route::get('planet/{planet_id}', [PlanetController::class, 'index']);
	Route::get('people/{people_id}', 'PeopleController@index');
	Route::get('film/{film_id}', [FilmController::class, 'index']);
	Route::get('startship/{startship_id}', 'StartshipController@index');
	Route::get('vehicule/{vehicule_id}', 'VehiculeController@index');
});
