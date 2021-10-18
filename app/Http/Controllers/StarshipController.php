<?php

namespace App\Http\Controllers;

use App\Models\PivotFilmStarship;
use App\Models\PivotPeopleFilm;
use App\Models\PivotPeopleStarship;
use App\Models\Starship;
use Illuminate\Http\Request;

class StarshipController extends Controller
{
	public function index($starship_id)
	{
		$starship = Starship::find($starship_id);
		$starship['url'] = route('starship', $starship_id);

		// Peoples
		$peoples = PivotPeopleStarship::where('starship_id', $starship_id)->get();
		$peopleArray = [];
		foreach ($peoples as $people) {
			$peopleArray[] = route('people', $people->people_id);
		}
		$starship['pilots'] = $peopleArray;

		// Films
		$films = PivotFilmStarship::where('starship_id', $starship_id)->get();
		$filmArray = [];
		foreach ($films as $film) {
			$filmArray[] = route('film', $film->film_id);
		}
		$starship['films'] = $filmArray;

		return $starship;
	}

	public function show()
	{
		$starships = Starship::all();
		foreach ($starships as $starship) {
			$starship_id = $starship->id;
			$starship['url'] = route('starship', $starship_id);

			// Peoples
			$peoples = PivotPeopleStarship::where('starship_id', $starship_id)->get();
			$peopleArray = [];
			foreach ($peoples as $people) {
				$peopleArray[] = route('people', $people->people_id);
			}
			$starship['pilots'] = $peopleArray;

			// Films
			$films = PivotFilmStarship::where('starship_id', $starship_id)->get();
			$filmArray = [];
			foreach ($films as $film) {
				$filmArray[] = route('film', $film->film_id);
			}
			$starship['films'] = $filmArray;
		}
		return response()->json($starships);
	}
}
