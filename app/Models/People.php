<?php

namespace App\Models;

use App\Models\Film;
use App\Models\PivotPeopleFilm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
	use HasFactory;

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

	protected $table = "peoples";

	//films
	public function films()
	{
		return $this->hasMany(PivotPeopleFilm::class);
	}

	//vehicles
	public function vehicles()
	{
		return $this->hasMany(PivotPeopleVehicle::class);
	}
}
