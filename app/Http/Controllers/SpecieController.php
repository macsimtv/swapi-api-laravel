<?php

namespace App\Http\Controllers;

use App\Models\PivotFilmSpecie;
use App\Models\PivotPeoplePlanet;
use App\Models\PivotPeopleSpecie;
use App\Models\Specie;

class SpecieController extends Controller
{

	public function index($specie_id)
	{
		$specie = Specie::find($specie_id)->first();

		// Planet
		$planet = PivotPeoplePlanet::where('people_id', $specie_id)->first();
		$specie['homeworld'] = route('planet', $planet->planet_id);

		//People
		$peoples = PivotPeopleSpecie::where('specie_id', $specie_id)->get();
		$peopleArray = [];
		foreach ($peoples as $people) {
			$peopleArray[] = route('people', $people->people_id);
		}
		$specie['people'] = $peopleArray;

		//Films
		$films = PivotFilmSpecie::where('specie_id', $specie_id)->get();
		$filmsArray = [];
		foreach ($films as $film) {
			$filmsArray[] = route('film', $film->film_id);
		}
		$specie['films'] = $filmsArray;

		$specie['url'] = route('specie', $specie_id);

		return response()->json($specie);
	}
}
