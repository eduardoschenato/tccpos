<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebsiteApiController;
use App\Models\Banner;
use App\Models\Section;
use App\Models\Post;
use App\Models\Player;
use App\Models\Game;
use App\Models\Parameter;

class WebsiteApiController extends Controller
{
    
    public function home() {
        $banners = Banner::where('location', 'home')->where('active', 1)->orderBy('featured', 'desc')->orderBy('title')->get();

        $sectionsTop = Section::where('type', 'homeStart')->orderBy('title')->with('images')->get();

        $posts = Post::where('active', 1)->orderBy('created_at', 'desc')->with('images')->take(3)->get();

        $previousGame = Game::where('date', '<', date('Y-m-d'))->orderBy('date', 'desc')->take(1)->get();

        $nextGame = Game::where('date', '>', date('Y-m-d'))->orderBy('date')->take(1)->get();

        $sectionsEnd = Section::where('type', 'homeEnd')->orderBy('title')->with('images')->get();

        $players = Player::where('active', 1)->orderBy('name')->with('player_position')->get();

        $parameters = Parameter::all();

        return response()->json([
            'banners' => $banners,
            'sectionsTop' => $sectionsTop,
            'posts' => $posts,
            'previousGame' => $previousGame,
            'nextGame' => $nextGame,
            'sectionsEnd' => $sectionsEnd,
            'players' => $players,
            'parameters' => $parameters
        ]);
    }

}
