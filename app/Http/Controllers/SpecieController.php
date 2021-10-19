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
		$specie = Specie::find($specie_id);
		$specie['url'] = route('specie', $specie_id);
		($specie['homeworld']) ? $specie['homeworld'] = route('planet', $specie['homeworld']) : $specie['homeworld'] = null;

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

		return response()->json($specie);
	}

	public function show()
	{
		$species = Specie::all();

		foreach ($species as $specie) {
			$specie_id = $specie->id;
			$specie['url'] = route('specie', $specie_id);
			($specie['homeworld']) ? $specie['homeworld'] = route('planet', $specie['homeworld']) : $specie['homeworld'] = null;
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
		}
		return response()->json($species);
	}
}
