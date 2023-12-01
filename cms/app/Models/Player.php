<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlayerPosition;
use App\Models\IndividualAssesment;

class Player extends Model
{
    use HasFactory;

    public function player_position() {
        return $this->belongsTo(PlayerPosition::class);
    }

    public function individual_assesments() {
        return $this->hasMany(IndividualAssesment::class);
    }
}
