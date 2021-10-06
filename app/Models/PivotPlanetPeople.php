<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotPlanetPeople extends Model {
	use HasFactory;

	public function planet() {
		$this->belongsTo(Planet::class);
	}

	public function people() {
		$this->belongsTo(People::class);
	}

}
