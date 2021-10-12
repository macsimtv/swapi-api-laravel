<?php

namespace App\Http\Controllers;

use App\Models\PivotPlanetFilm;
use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
	public function index($planet_id)
	{
		$planet = Planet::find($planet_id);
		$films = PivotPlanetFilm::where('planet_id', $planet->id)->get();
		$filmsArray = [];
		foreach ($films as $film) {
			$filmsArray[] = route('planet', $film->film_id);
		}
		$planet['films'] = $filmsArray;
		// $planet['films'] = $array;
		return response()->json($planet);
	}
}
