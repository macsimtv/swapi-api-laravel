<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Film;
=======
>>>>>>> a29bc2ed615844b5b4ac3c4cc225e05e9600e708
use Illuminate\Http\Request;

class FilmController extends Controller
{
<<<<<<< HEAD
	public function index($film_id)
	{
		$film = Film::find($film_id)->first();
		$film['peoples'];
		foreach ($film->peoples as $people) {
			array_push($film['films'], $people->people);
		}
		return $film;
	}
=======
    //
>>>>>>> a29bc2ed615844b5b4ac3c4cc225e05e9600e708
}
