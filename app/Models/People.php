<?php

namespace App\Models;

use App\Models\PivotPeopleStarship;
use App\Models\Starship;
use App\Models\Film;
use App\Models\PivotPeopleFilm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
	use HasFactory;

	protected $table = "peoples";

	protected $fillable = [
		"name",
		"height",
		"mass",
		"hair_color",
		"skin_color",
		"eye_color",
		"birth_year",
		"gender",
		"homeworld",
		"films",
		"species",
		"vehicles",
		"starships",
		"edited",
		"url"
	];

	// Films
	public function films()
	{
		return $this->hasMany(PivotPeopleFilm::class);
	}

	// Vehicles
	public function vehicles()
	{
		return $this->hasMany(PivotPeopleVehicle::class);
	}

	// Starships
	public function starships()
	{
		return $this->hasMany(PivotPeopleStarship::class);
	}

	// Species
	public function species()
	{
		return $this->hasMany(PivotPeopleSpecie::class);
	}
}
