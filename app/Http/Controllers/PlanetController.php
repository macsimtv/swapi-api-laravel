<?php

namespace App\Http\Controllers;

use App\Models\PivotPeoplePlanet;
use App\Models\PivotPlanetFilm;
use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
	public function index($planet_id)
	{
		$planet = Planet::find($planet_id);

		// Peoples
		$peoples = PivotPeoplePlanet::where('planet_id', $planet_id)->get();
		$peopleArray = [];
		foreach ($peoples as $people) {
			$peopleArray[] = route('people', $people->people_id);
		}
		$planet['residents'] = $peopleArray;

		// Films
		$films = PivotPlanetFilm::where('planet_id', $planet->id)->get();
		$filmsArray = [];
		foreach ($films as $film) {
			$filmsArray[] = route('planet', $film->film_id);
		}
		$planet['films'] = $filmsArray;

		$planet['url'] = route('planet', $planet_id);

		return response()->json($planet);
	}
}
