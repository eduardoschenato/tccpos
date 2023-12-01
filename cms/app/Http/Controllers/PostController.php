<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostImage;

class PostController extends Controller
{

    public function index() {
        $items = Post::orderBy('title')->get();
        return view('cms.posts', ['items' => $items]);
    }

    public function new() {
        return view("cms.post", ["item" => new Post(), "categories" => PostCategory::all()]);
    }

    public function form($id) {
        $item = Post::find($id);

        if(!$item) {
            return redirect()->route('postsList');
        }

        return view("cms.post", ["item" => $item, "categories" => PostCategory::all()]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'post_category_id' => 'required|exists:post_categories,id',
            'title' => 'required',
            'summary' => 'required',
            'text' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = new Post();
            
            $item->post_category_id = $request->input('post_category_id');
            $item->title = $request->input('title');
            $item->summary = $request->input('summary');
            $item->text = $request->input('text');
            $item->active = $request->input('active') ?? 0;

            $item->save();

            if($request->file('url_image')) {
                foreach($request->file('url_image') as $file) {
                    $path = $file->store('public');

                    $image = new PostImage();

                    $image->url_image = str_replace('public/', '', $path);
                    $image->post_id = $item->id;
                    $image->type = "I";
                    $image->subtitle = "";

                    $image->save();
                }
            }
        }

        return redirect()->route('postsList');
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'post_category_id' => 'required|exists:post_categories,id',
            'title' => 'required',
            'summary' => 'required',
            'text' => 'required'
        ]);

        if (!$validator->fails()) {
            $item = Post::find($id);
            
            $item->post_category_id = $request->input('post_category_id');
            $item->title = $request->input('title');
            $item->summary = $request->input('summary');
            $item->text = $request->input('text');
            $item->active = $request->input('active') ?? 0;

            $item->save();

            if($request->file('url_image')) {
                foreach($request->file('url_image') as $file) {
                    $path = $file->store('public');

                    $image = new PostImage();

                    $image->url_image = str_replace('public/', '', $path);
                    $image->post_id = $item->id;
                    $image->type = "I";
                    $image->subtitle = "";

                    $image->save();
                }
            }
        }

        return redirect()->route('postsList');
    }

    public function destroy($id) {
        $item = Post::find($id);

        if(!$item) {
            return redirect()->route('postsList');
        }

        $item->delete();

        return redirect()->route('postsList');
    }

    public function destroyImage($id, $image) {
        $item = PostImage::find($image);

        if(!$item) {
            return redirect()->route('postsForm', ['id' => $id]);
        }

        $item->delete();

        return redirect()->route('postsForm', ['id' => $id]);
    }

}
