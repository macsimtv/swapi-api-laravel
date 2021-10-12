<?php

namespace App\Models;

use App\Models\People;
use App\Models\Starship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotPeopleStarship extends Model
{
	use HasFactory;
	protected $table = "pivot_people_starships";
	public function people()
	{
		return $this->belongsTo(People::class);
	}

	public function starship()
	{
		return $this->belongsTo(Starship::class);
	}
}
