<?php

namespace App\Models;

use App\Models\PivotPeopleStarship;
use App\Models\Starship;
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

    public function starships()
    {
        return $this->belongsToMany(Starship::class);
    }
    public function people_starships()
    {
        return $this->hasMany(PivotPeopleStarship::class);
    }
}
