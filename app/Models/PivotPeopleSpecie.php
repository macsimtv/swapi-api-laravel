<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PivotPeopleSpecie extends Model
{
	use HasFactory;

	public function people(): BelongsTo {
		return $this->belongsTo(People::class);
	}

	public function specie(): BelongsTo {
		return $this->belongsTo(specie::class);
	}
}
