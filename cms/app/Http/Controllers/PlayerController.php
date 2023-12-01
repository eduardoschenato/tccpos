<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Player;
use App\Models\PlayerPosition;

class PlayerController extends Controller
{

    public function index() {
        $items = Player::orderBy('name')->get();
        return view('registrations.players', ['items' => $items]);
    }

    public function new() {
        return view("registrations.player", ["item" => new Player(), "positions" => PlayerPosition::all()]);
    }

    public function form($id) {
        $item = Player::find($id);

        if(!$item) {
            return redirect()->route('playersList');
        }

        return view("registrations.player", ["item" => $item, "positions" => PlayerPosition::all()]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'player_position_id' => 'required|exists:player_positions,id',
            'name' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = new Player();
            
            $item->player_position_id = $request->input('player_position_id');
            $item->name = $request->input('name');
            $item->active = $request->input('active') ?? 0;
            $item->url_image = "";

            $file = $request->file('url_image');

            if($file) {
                $path = $file->store('public');
                $item->url_image = str_replace('public/', '', $path);
            }
            
            $item->save();
        }

        return redirect()->route('playersList');
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'player_position_id' => 'required|exists:player_positions,id',
            'name' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = Player::find($id);
            
            $item->player_position_id = $request->input('player_position_id');
            $item->name = $request->input('name');
            $item->active = $request->input('active') ?? 0;

            $file = $request->file('url_image');

            if($file) {
                $path = $file->store('public');
                $item->url_image = str_replace('public/', '', $path);
            }
            
            $item->save();
        }

        return redirect()->route('playersList');
    }

    public function destroy($id) {
        $item = Player::find($id);

        if(!$item) {
            return redirect()->route('playersList');
        }

        $item->delete();

        return redirect()->route('playersList');
    }

}
