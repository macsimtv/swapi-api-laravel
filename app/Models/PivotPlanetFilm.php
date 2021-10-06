<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotPlanetFilm extends Model
{
	use HasFactory;

	public function planet()
	{
		return $this->belongsTo(Planet::class);
	}

	public function film()
	{
		return $this->belongsTo(Film::class);
	}
}
