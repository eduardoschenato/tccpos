<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Section;
use App\Models\SectionImage;

class SectionController extends Controller
{

    public function index() {
        $items = Section::orderBy('title')->get();
        return view('cms.sections', ['items' => $items]);
    }

    public function new() {
        return view("cms.section", ["item" => new Section(), "types" => [
            "homeStart" => "Página Inicial - Início",
            "homeEnd" => "Página Inicial - Final"
        ]]);
    }

    public function form($id) {
        $item = Section::find($id);

        if(!$item) {
            return redirect()->route('sectionsList');
        }

        return view("cms.section", ["item" => $item, "types" => [
            "homeStart" => "Página Inicial - Início",
            "homeEnd" => "Página Inicial - Final"
        ]]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required',
            'text' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = new Section();
            
            $item->type = $request->input('type');
            $item->title = $request->input('title');
            $item->text = $request->input('text');

            $item->save();

            if($request->file('url_image')) {
                foreach($request->file('url_image') as $file) {
                    $path = $file->store('public');

                    $image = new SectionImage();

                    $image->url_image = str_replace('public/', '', $path);
                    $image->section_id = $item->id;

                    $image->save();
                }
            }
        }

        return redirect()->route('sectionsList');
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required',
            'text' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = Section::find($id);
            
            $item->type = $request->input('type');
            $item->title = $request->input('title');
            $item->text = $request->input('text');

            $item->save();

            if($request->file('url_image')) {
                foreach($request->file('url_image') as $file) {
                    $path = $file->store('public');

                    $image = new SectionImage();

                    $image->url_image = str_replace('public/', '', $path);
                    $image->section_id = $item->id;

                    $image->save();
                }
            }
        }

        return redirect()->route('sectionsList');
    }

    public function destroy($id) {
        $item = Section::find($id);

        if(!$item) {
            return redirect()->route('sectionsList');
        }

        $item->delete();

        return redirect()->route('sectionsList');
    }

    public function destroyImage($id, $image) {
        $item = SectionImage::find($image);

        if(!$item) {
            return redirect()->route('sectionsForm', ['id' => $id]);
        }

        $item->delete();

        return redirect()->route('sectionsForm', ['id' => $id]);
    }

}
