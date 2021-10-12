<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotFilmVehicle extends Model
{
    use HasFactory;
	protected $table = "pivot_film_vehicles";
    public function vehicle()
	{
		return $this->belongsTo(Vehicle::class);
	}

	public function film()
	{
		return $this->belongsTo(Film::class);
	}
}
