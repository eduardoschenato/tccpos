<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuizQuestion;
use App\Models\IndividualAssesment;
use App\Models\CollectiveAssesment;

class QuizAnswer extends Model
{
    use HasFactory;

    public function quiz_question() {
        return $this->belongsTo(QuizQuestion::class);
    }

    public function individual_assesment() {
        return $this->belongsTo(IndividualAssesment::class);
    }

    public function collective_assesment() {
        return $this->belongsTo(CollectiveAssesment::class);
    }

}
