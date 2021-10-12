<?php

namespace App\Http\Controllers;

use App\Models\PivotFilmVehicle;
use App\Models\PivotPeopleFilm;
use App\Models\PivotPeopleVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
	public function index($vehicle_id)
	{
		$vehicle = Vehicle::find($vehicle_id);
		$vehicle['url'] = route('vehicle', $vehicle_id);

		// Peoples
		$peoples = PivotPeopleVehicle::where('vehicle_id', $vehicle_id)->get();
		$peoplesArray = [];
		foreach ($peoples as $people) {
			$peoplesArray[] = route('people', $people->people_id);
		}
		$vehicle['pilots'] = $peoplesArray;

		// Films
		$films = PivotFilmVehicle::where('vehicle_id', $vehicle_id)->get();
		$filmsArray = [];
		foreach ($films as $film) {
			$filmsArray[] = route('film', $film->film_id);
		}
		$vehicle['films'] = $filmsArray;

		return $vehicle;
	}
}
