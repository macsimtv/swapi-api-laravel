<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PivotFilmSpecie extends Model {

	use HasFactory;
	protected $table = "pivot_film_species";
	public function film(): BelongsTo {
		return $this->belongsTo(Film::class);
	}

	public function specie(): BelongsTo {
		return $this->belongsTo(Specie::class);
	}

}
