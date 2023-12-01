<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\Player;

class IndividualAssesment extends Model
{
    use HasFactory;

    public function player() {
        return $this->belongsTo(Player::class);
    }

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function answers() {
        return $this->hasMany(QuizAnswer::class);
    }
    
}
