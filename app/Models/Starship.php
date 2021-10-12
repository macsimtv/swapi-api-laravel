<?php

namespace App\Models;

use App\Models\People;
use App\Models\PivotPeopleStarship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starship extends Model
{
	use HasFactory;

	protected $fillable = [
		"name",
		"model",
		"manufacturer",
		"cost_in_credits",
		"length",
		"max_atmosphering_speed",
		"crew",
		"passengers",
		"cargo_capacity",
		"consumables",
		"hyperdrive_rating",
		"MGLT",
		"starship_class",
		"created",
		"edited",
		"url"
	];

	public function peoples()
	{
		return $this->hasMany(PivotPeopleStarship::class);
	}

	public function films()
	{
		return $this->hasMany(PivotFilmStarship::class);
	}
}
