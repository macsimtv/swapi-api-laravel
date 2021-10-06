<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Planet;
=======
>>>>>>> a29bc2ed615844b5b4ac3c4cc225e05e9600e708
use Illuminate\Http\Request;

class PlanetController extends Controller
{
<<<<<<< HEAD
	public function index($planet_id)
	{
		$planet = Planet::find($planet_id)->first();
		$planet['films'];
		foreach ($planet->films as $film) {
			array_push($planet['films'], $film->film);
		}
		return $planet;
	}
=======

	public function index($id) {}

>>>>>>> a29bc2ed615844b5b4ac3c4cc225e05e9600e708
}
