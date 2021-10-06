<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotPlanetFilm extends Model {

	use HasFactory;

	public function planet() {
		$this->belongsTo(Planet::class);
	}

	public function film() {
		$this->belongsTo(Film::class);
	}

}
