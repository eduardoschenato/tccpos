<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Parameter;

class ParameterController extends Controller
{

    public function index() {
        $items = Parameter::orderBy('type')->get();
        return view('cms.parameters', ['items' => $items]);
    }

    public function form($id) {
        $item = Parameter::find($id);

        if(!$item) {
            return redirect()->route('parametersList');
        }

        return view("cms.parameter", ["item" => $item]);
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [                    
            'value' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = Parameter::find($id);
            
            $item->value = $request->input('value');

            $item->save();
        }

        return redirect()->route('parametersList');
    }

}
