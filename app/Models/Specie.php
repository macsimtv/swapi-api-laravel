<?php

namespace App\Models;

use App\Models\People;
use App\Models\PivotPeopleSpecie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "classification",
        "designation",
        "average_height",
        "skin_colors",
        "hair_colors",
        "eye_colors",
        "average_lifespan",
        "homeworld",
        "language",
        "created",
        "edited",
        "url"
    ];

    public function peoples()
    {
        return $this->belongsToMany(People::class);
    }
    public function people_species()
    {
        return $this->hasMany(PivotPeopleSpecie::class);
    }

}
