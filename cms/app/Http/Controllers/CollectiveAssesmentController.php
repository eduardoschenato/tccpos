<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CollectiveAssesment;

class CollectiveAssesmentController extends Controller
{
    
    public function index() {
        $items = CollectiveAssesment::orderBy('created_at', 'desc')->get();
        return view('assesments.collective_assesments', ['items' => $items]);
    }

    public function show($id) {
        $item = CollectiveAssesment::find($id);

        if(!$item) {
            return redirect()->route('collectiveAssesmentsList');
        }

        return view("assesments.collective_assesment", ["item" => $item]);
    }

}
