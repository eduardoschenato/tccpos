<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{

    public function index() {
        $items = User::orderBy('name')->get();
        return view('configurations.users', ['items' => $items]);
    }

    public function new() {
        return view("configurations.user", ["item" => new User()]);
    }

    public function form($id) {
        $item = User::find($id);

        if(!$item) {
            return redirect()->route('usersList');
        }

        return view("configurations.user", ["item" => $item]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [                
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        if (!$validator->fails()) {
            $item = new User();
            
            $item->name = $request->input('name');
            $item->email = $request->input('email');
            $item->password = Hash::make($request->input('password'));

            $item->save();
        }

        return redirect()->route('usersList');
    }

    public function update($id, Request $request) {
        if ($request->input('password') == "") {
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id
            ];
        } else {
            $rules = [                    
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'confirmed|min:6|max:255'
            ];
        }

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()) {
            $item = User::find($id);
            
            $item->name = $request->input('name');
            $item->email = $request->input('email');
            $item->password = Hash::make($request->input('password'));

            $item->save();
        }

        return redirect()->route('usersList');
    }

    public function destroy($id) {
        $item = User::find($id);

        if(!$item) {
            return redirect()->route('usersList');
        }

        $item->delete();

        return redirect()->route('usersList');
    }

}
