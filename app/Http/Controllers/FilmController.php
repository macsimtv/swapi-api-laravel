<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\PivotFilmSpecie;
use App\Models\PivotFilmStarship;
use App\Models\PivotFilmVehicle;
use App\Models\PivotPeopleFilm;
use App\Models\PivotPlanetFilm;
use Illuminate\Http\Request;

class FilmController extends Controller
{
	public function index($film_id)
	{
		$film = Film::find($film_id);

		// Peoples
		$peoples = PivotPeopleFilm::where('film_id', $film_id)->get();
		$peopleArray = [];
		foreach ($peoples as $people) {
			$peopleArray[] = route('people', $people->people_id);
		}
		$film['characters'] = $peopleArray;

		// Planets
		$planets = PivotPlanetFilm::where('film_id', $film->id)->get();
		$planetsArray = [];
		foreach ($planets as $planet) {
			$planetsArray[] = route('planet', $planet->planet_id);
		}
		$film['planets'] = $planetsArray;

		// Starships
		$starships = PivotFilmStarship::where('film_id', $film->id)->get();
		$starshipsArray = [];
		foreach ($starships as $starship) {
			$starshipsArray[] = route('starship', $starship->starship_id);
		}
		$film['starships'] = $starshipsArray;

		// Vehicles
		$vehicles = PivotFilmVehicle::where('film_id', $film->id)->get();
		$vehiclesArray = [];
		foreach ($vehicles as $vehicle) {
			$vehiclesArray[] = route('vehicle', $vehicle->vehicle_id);
		}
		$film['vehicles'] = $vehiclesArray;

		// Species
		$species = PivotFilmSpecie::where('film_id', $film->id)->get();
		$speciesArray = [];
		foreach ($species as $specie) {
			$speciesArray[] = route('specie', $specie->specie_id);
		}
		$film['species'] = $speciesArray;

		$film['url'] = route('film', $film_id);

		return response()->json($film);
	}

	public function show()
	{
		$films = Film::all();
		foreach ($films as $film) {
			$film_id = $film->id;
			// Peoples
			$peoples = PivotPeopleFilm::where('film_id', $film_id)->get();
			$peopleArray = [];
			foreach ($peoples as $people) {
				$peopleArray[] = route('people', $people->people_id);
			}
			$film['characters'] = $peopleArray;

			// Planets
			$planets = PivotPlanetFilm::where('film_id', $film->id)->get();
			$planetsArray = [];
			foreach ($planets as $planet) {
				$planetsArray[] = route('planet', $planet->planet_id);
			}
			$film['planets'] = $planetsArray;

			// Starships
			$starships = PivotFilmStarship::where('film_id', $film->id)->get();
			$starshipsArray = [];
			foreach ($starships as $starship) {
				$starshipsArray[] = route('starship', $starship->starship_id);
			}
			$film['starships'] = $starshipsArray;

			// Vehicles
			$vehicles = PivotFilmVehicle::where('film_id', $film->id)->get();
			$vehiclesArray = [];
			foreach ($vehicles as $vehicle) {
				$vehiclesArray[] = route('vehicle', $vehicle->vehicle_id);
			}
			$film['vehicles'] = $vehiclesArray;

			//Species
			$species = PivotFilmSpecie::where('film_id', $film->id)->get();
			$speciesArray = [];
			foreach ($species as $specie) {
				$speciesArray[] = route('specie', $specie->specie_id);
			}
			$film['species'] = $speciesArray;
		}

		$film['url'] = route('film', $film_id);
		return response()->json($films);
	}
}
