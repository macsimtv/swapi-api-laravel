<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
	public function index($planet_id)
	{
		$planet = Planet::find($planet_id);
		$planet->films;
		foreach ($planet->films as $film) {
			$film->film;
		}
		// $planet['films'] = $array;
		return response()->json($planet);
	}
}
