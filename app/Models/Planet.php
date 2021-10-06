<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Planet extends Model
{
	use HasFactory;

	protected $fillable = [
		"name",
		"rotation_period",
		"orbital_period",
		"diameter",
		"climate",
		"gravity",
		"terrain",
		"surface_water",
		"population",
		"residents",
		"films",
		"edited",
		"url"
	];

	public function films()
	{
		return $this->hasMany(PivotPlanetFilm::class);
	}
}
