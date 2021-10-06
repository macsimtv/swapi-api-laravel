<?php

namespace App\Models;

use App\Models\People;
use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotPeopleFilm extends Model
{
    use HasFactory;
    public function people(){
        $this->belongsTo(People::class);
    }
    public function film(){
        $this->belongsTo(Film::class);
    }
}
