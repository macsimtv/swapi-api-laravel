<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotPlanetPeople extends Model
{
	use HasFactory;

	public function planet()
	{
		return $this->belongsTo(Planet::class);
	}

	public function people()
	{
		return $this->belongsTo(People::class);
	}
}
