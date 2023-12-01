<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Game;

class GameController extends Controller
{

    public function index() {
        $items = Game::orderBy('date', 'desc')->get();
        return view('registrations.games', ['items' => $items]);
    }

    public function new() {
        return view("registrations.game", ["item" => new Game()]);
    }

    public function form($id) {
        $item = Game::find($id);

        if(!$item) {
            return redirect()->route('gamesList');
        }

        return view("registrations.game", ["item" => $item]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [                
            'opponent' => 'required',
            'date' => 'required|date',              
            'place' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = new Game();
            
            $item->opponent = $request->input('opponent');
            $item->date = $request->input('date');
            $item->place = $request->input('place');
            $item->team_score = $request->input('team_score') ?? 0;
            $item->opponent_score = $request->input('opponent_score') ?? 0;
            $item->url_image = "";

            $file = $request->file('url_image');

            if($file) {
                $path = $file->store('public');
                $item->url_image = str_replace('public/', '', $path);
            }
            
            $item->save();
        }

        return redirect()->route('gamesList');
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [                
            'opponent' => 'required',
            'date' => 'required|date',              
            'place' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = Game::find($id);
            
            $item->opponent = $request->input('opponent');
            $item->date = $request->input('date');
            $item->place = $request->input('place');
            $item->team_score = $request->input('team_score');
            $item->opponent_score = $request->input('opponent_score');

            $file = $request->file('url_image');

            if($file) {
                $path = $file->store('public');
                $item->url_image = str_replace('public/', '', $path);
            }
            
            $item->save();
        }

        return redirect()->route('gamesList');
    }

    public function destroy($id) {
        $item = Game::find($id);

        if(!$item) {
            return redirect()->route('gamesList');
        }

        $item->delete();

        return redirect()->route('gamesList');
    }

}
