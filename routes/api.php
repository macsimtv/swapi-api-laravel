<?php

use App\Http\Controllers\PeopleController;
use App\Http\Controllers\StarshipController;
use App\Http\Controllers\VehiculeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\SpecieController;
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

	Route::get('planet/{planet_id}', [PlanetController::class, 'index'])->name('planet');
	Route::get('people/{people_id}', [PeopleController::class, 'index'])->name('people');
	Route::get('film/{film_id}', [FilmController::class, 'index'])->name('film');
	Route::get('startship/{startship_id}', [StarshipController::class, 'index'])->name('starship');
	Route::get('vehicle/{vehicle_id}', [VehiculeController::class, 'index'])->name('vehicle');
	Route::get('/specie/{specie_id}', [SpecieController::class, 'index'])->name('specie');
});
