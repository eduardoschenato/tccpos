<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndividualAssesment;

class IndividualAssesmentController extends Controller
{
    
    public function index() {
        $items = IndividualAssesment::orderBy('created_at', 'desc')->get();
        return view('assesments.individual_assesments', ['items' => $items]);
    }

    public function show($id) {
        $item = IndividualAssesment::find($id);

        if(!$item) {
            return redirect()->route('individualAssesmentsList');
        }

        return view("assesments.individual_assesment", ["item" => $item]);
    }

}
