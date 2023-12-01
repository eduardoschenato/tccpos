<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuizQuestion;
use App\Models\IndividualAssesment;
use App\Models\CollectiveAssesment;

class Quiz extends Model
{
    use HasFactory;

    public function questions() {
        return $this->hasMany(QuizQuestion::class);
    }

    public function individual_assesments() {
        return $this->hasMany(IndividualAssesment::class);
    }

    public function collective_assesments() {
        return $this->hasMany(CollectiveAssesment::class);
    }
}
