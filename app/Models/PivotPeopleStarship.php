<?php

namespace App\Models;

use App\Models\People;
use App\Models\Starship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotPeopleStarship extends Model
{
    use HasFactory;

    public function people(){
        return $this->belongsTo(People::class);
    }

    public function starship(){
        return $this->belongsTo(starship::class);
    }


}
