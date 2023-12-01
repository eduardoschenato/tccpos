<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndividualAssesment;
use App\Models\CollectiveAssesment;

class AppApiController extends Controller
{

    public function individualAssesments() {
        return response()->json(IndividualAssesment::orderBy('created_at', 'desc')->with('quiz')->with('player')->with('answers')->get());
    }

    public function quizzes($id) {
        return response()->json(IndividualAssesment::findOrFail($id));
    }

    public function collectiveAssesments() {
        return response()->json(CollectiveAssesment::orderBy('created_at', 'desc')->with('quiz')->with('answers')->get());
    }

    public function collectiveAssesment($id) {
        return response()->json(CollectiveAssesment::findOrFail($id));
    }

}
