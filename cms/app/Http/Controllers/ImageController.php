<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function get($path) {
        return response(Storage::get('public/' . $path), 200)->header('Content-Type', Storage::mimeType($path));
    }

}
