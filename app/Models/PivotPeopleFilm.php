<?php

namespace App\Models;

use App\Models\People;
use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotPeopleFilm extends Model
{
	protected $table = "pivot_people_films";

	use HasFactory;

	public function people()
	{
		return $this->belongsTo(People::class);
	}
	public function film()
	{
		return $this->belongsTo(Film::class);
	}
}
