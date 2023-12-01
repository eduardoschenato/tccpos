<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{

    public function login() {
        return view('login');
    }

    public function doLogin(Request $request) {
        $validator = Validator::make($request->all(), [                
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('login');
        }

        $user = User::where('email', $request->get('email'))->first();

        if (!$user) {
            return redirect()->route('login');
        }
        
        if(!Hash::check($request->get('password'), $user->password)) {
            return redirect()->route('login');
        }

        session(['user' => $user]);

        return redirect()->route('playersList');
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        return redirect()->route('login');
    }

}
