<?php

namespace App\Models;

use App\Models\People;
use App\Models\PivotPeopleFilm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
	use HasFactory;
	protected $fillable = [
		"title",
		"episode_id",
		"opening_crawl",
		"director",
		"producer",
		"release_date",
		"characters",
		"planets",
		"starships",
		"vehicles",
		"species",
		"created",
		"edited",
		"url",
	];

	//vehicles
	public function peoples()
	{
		return $this->hasMany(PivotPeopleFilm::class);
	}

    public function starchips()
	{
		return $this->hasMany(PivotFilmStarship::class);
	}

    public function vehicle()
	{
		return $this->hasMany(PivotFilmVehicle::class);
	}
}
