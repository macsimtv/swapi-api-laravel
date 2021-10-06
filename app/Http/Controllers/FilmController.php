<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
	public function index($film_id)
	{
		$film = Film::find($film_id)->first();
		$film['peoples'];
		foreach ($film->peoples as $people) {
			array_push($film['films'], $people->people);
		}
		return $film;
	}
}
