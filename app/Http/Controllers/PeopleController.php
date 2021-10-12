<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\PivotPeopleFilm;
use App\Models\PivotPeoplePlanet;
use App\Models\PivotPeopleSpecie;
use App\Models\PivotPeopleStarship;
use App\Models\PivotPeopleVehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
	public function index($people_id)
	{
		$people = People::find($people_id);

		// Planet
		$planet = PivotPeoplePlanet::where('people_id', $people_id)->first();
		$planet['homeworld'] = route('planet', $planet->planet_id);

		// Films
		$films = PivotPeopleFilm::where('people_id', $people_id)->get();
		$filmsArray = [];
		foreach ($films as $film) {
			$filmsArray[] = route('film', $film->film_id);
		}
		$people['films'] = $filmsArray;

		// Species
		$species = PivotPeopleSpecie::where('people_id', $people_id)->get();
		$speciesArray = [];
		foreach ($species as $specie) {
			$speciesArray[] = route('specie', $specie->specie_id);
		}
		$people['species'] = $speciesArray;

		// Vehicles
		$vehicles = PivotPeopleVehicle::where('people_id', $people_id)->get();
		$vehiclesArray = [];
		foreach ($vehicles as $vehicle) {
			$vehiclesArray[] = route('vehicle', $vehicle->vehicle_id);
		}
		$people['vehicles'] = $vehiclesArray;

		// Starships
		$starships = PivotPeopleStarship::where('people_id', $people_id)->get();
		$starshipsArray = [];
		foreach ($starships as $starship) {
			$starshipsArray[] = route('starship', $starship->starship_id);
		}
		$people['starships'] = $starshipsArray;

		$people['url'] = route('people', $people_id);

		return response()->json($people);
	}
}
