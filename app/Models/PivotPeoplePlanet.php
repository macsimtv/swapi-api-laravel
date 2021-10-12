<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotPeoplePlanet extends Model
{
	use HasFactory;

	protected $table = "pivot_planet_people";
	public function planet()
	{
		return $this->belongsTo(Planet::class);
	}

	public function people()
	{
		return $this->belongsTo(People::class);
	}
}
