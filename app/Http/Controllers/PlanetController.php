<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
	public function index($planet_id)
	{
		$planet = Planet::find($planet_id)->first();
		$planet['films'];
		foreach ($planet->films as $film) {
			array_push($planet['films'], $film->film);
		}
		return $planet;
	}
}
