<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannerController extends Controller
{

    public function index() {
        $items = Banner::orderBy('title')->get();
        return view('cms.banners', ['items' => $items]);
    }

    public function new() {
        return view("cms.banner", ["item" => new Banner(), "locations" => ["home" => "Página Inicial"]]);
    }

    public function form($id) {
        $item = Banner::find($id);

        if(!$item) {
            return redirect()->route('bannersList');
        }

        return view("cms.banner", ["item" => $item, "locations" => ["home" => "Página Inicial"]]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'location' => 'required',
            'title' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = new Banner();
            
            $item->location = $request->input('location');
            $item->title = $request->input('title');
            $item->subtitle = $request->input('subtitle');
            $item->link = $request->input('link') ?? '';
            $item->is_external = $request->input('is_external') ?? 0;
            $item->new_tab = $request->input('new_tab') ?? 0;
            $item->active = $request->input('active') ?? 0;
            $item->featured = $request->input('featured') ?? 0;
            $item->url_image = "";

            $file = $request->file('url_image');

            if($file) {
                $path = $file->store('public');
                $item->url_image = str_replace('public/', '', $path);
            }
            
            $item->save();
        }

        return redirect()->route('bannersList');
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'location' => 'required',
            'title' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = Banner::find($id);
            
            $item->location = $request->input('location');
            $item->title = $request->input('title');
            $item->subtitle = $request->input('subtitle');
            $item->link = $request->input('link') ?? '';
            $item->is_external = $request->input('is_external') ?? 0;
            $item->new_tab = $request->input('new_tab') ?? 0;
            $item->active = $request->input('active') ?? 0;
            $item->featured = $request->input('featured') ?? 0;

            $file = $request->file('url_image');

            if($file) {
                $path = $file->store('public');
                $item->url_image = str_replace('public/', '', $path);
            }
            
            $item->save();
        }

        return redirect()->route('bannersList');
    }

    public function destroy($id) {
        $item = Banner::find($id);

        if(!$item) {
            return redirect()->route('bannersList');
        }

        $item->delete();

        return redirect()->route('bannersList');
    }

}
