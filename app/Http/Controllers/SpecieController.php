<?php

namespace App\Http\Controllers;

use App\Models\PivotFilmSpecie;
use App\Models\PivotPeopleSpecie;
use App\Models\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{

	public function index($id) {
		$specie = Specie::find($id)->first();

		if($specie === null) {
			return response()->json([
				"detail" => "Not found"
			]);
		}

		//People
		$peoples = PivotPeopleSpecie::where('specie_id', $id)->get();
		$peopleArray = [];
		foreach ($peoples as $people) {
			$peopleArray[] = route('people', $people->people_id);
		}
		$specie['people'] = $peopleArray;

		//Films
		$films = PivotFilmSpecie::where('specie_id', $id)->get();
		$filmsArray = [];
		foreach ($films as $film) {
			$filmsArray[] = route('film', $film->film_id);
		}
		$specie['films'] = $filmsArray;

		$specie['url'] = route('specie', $id);

		return response()->json($specie);
	}

}
