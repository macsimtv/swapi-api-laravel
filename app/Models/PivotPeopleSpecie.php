<?php

namespace App\Models;

use App\Models\People;
use App\Models\Specie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotPeopleSpecie extends Model
{
    use HasFactory;

    public function people(){
        return $this->belongsTo(People::class);
    }

    public function specie(){
        return $this->belongsTo(specie::class);
    }
}
