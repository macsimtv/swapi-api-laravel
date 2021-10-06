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

	public function films()
	{
		return $this->belongsToMany(Film::class);
	}
	public function people_films()
	{
		return $this->hasMany(PivotPeopleFilm::class);
	}

	public function vehicles()
	{
		return $this->belongsToMany(Vehicle::class);
	}

	public function people_vehicles()
	{
		return $this->hasMany(PivotPeopleVehicle::class);
	}

    public function starships()
    {
        return $this->belongsToMany(Starship::class);
    }
    public function people_starships()
    {
        return $this->hasMany(PivotPeopleStarship::class);
    }

	public function species()
    {
        return $this->belongsToMany(Specie::class);
    }
    public function people_species()
    {
        return $this->hasMany(PivotPeopleSpecie::class);
    }
}
