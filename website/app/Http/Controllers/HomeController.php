<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    
    public function index() { 
        $response = Http::get('http://localhost/tcc_pos/cms/public/api/website/home');
        $homeData = $response->object();

        $parametersByType = [];

        foreach($homeData->parameters as $parameter) {
            $parametersByType[$parameter->type] = $parameter->value;
        }
        
        return view('home', [
            'banners' => $homeData->banners,
            'sectionsTop' => $homeData->sectionsTop,
            'posts' => $homeData->posts,
            'previousGame' => $homeData->previousGame[0],
            'nextGame' => $homeData->nextGame[0],
            'sectionsEnd' => $homeData->sectionsEnd,
            'players' => $homeData->players,
            'parameters' => $parametersByType
        ]);
    }

}
