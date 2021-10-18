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
use App\Http\Middleware\JwtMiddleware;
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
	'prefix' => 'auth'
], function ($router) {
	Route::post('/login', [AuthController::class, 'login']);
	Route::post('/register', [AuthController::class, 'register']);
});

Route::group([
	'middleware' => 'auth:api',
	'prefix' => 'auth'
], function ($router) {
	Route::post('/logout', [AuthController::class, 'logout']);
	Route::post('/refresh', [AuthController::class, 'refresh']);
	Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::group([
	'middleware' => 'auth:api',
	'prefix' => 'v1'

], function ($router) {

	Route::get('planets/{planet_id}', [PlanetController::class, 'index'])->name('planet');
	Route::get('planets', [PlanetController::class, "show"])->name('planets');
	Route::get('peoples/{people_id}', [PeopleController::class, 'index'])->name('people');
	Route::get('peoples', [PeopleController::class, "show"])->name('peoples');
	Route::get('films/{film_id}', [FilmController::class, 'index'])->name('film');
	Route::get('films', [FilmController::class, "show"])->name('films');
	Route::get('starships/{startship_id}', [StarshipController::class, 'index'])->name('starship');
	Route::get('starships', [StarshipController::class, "show"])->name('starships');
	Route::get('vehicles/{vehicle_id}', [VehiculeController::class, 'index'])->name('vehicle');
	Route::get('vehicles', [VehiculeController::class, "show"])->name('vehicles');
	Route::get('/species/{specie_id}', [SpecieController::class, 'index'])->name('specie');
	Route::get('species', [SpecieController::class, "show"])->name('species');
});
