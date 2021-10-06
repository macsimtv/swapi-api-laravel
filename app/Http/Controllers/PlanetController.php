<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
	public function index($planet_id)
	{
		$planet = Planet::find($planet_id)->first();
		$array = array();
		foreach ($planet->films as $film) {
			$array[] = $film->film;
		}
		$planet['film'] = $array;
		return $planet;
	}
}
