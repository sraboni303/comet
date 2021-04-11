<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // show page
    public function showPage(){
        $tag = Tag::all()->where('status', true);
        $category = Category::all()->where('status', true);

        return view('backend.create-post', [
            'tags' => $tag,
            'categories' => $category,
        ]);
    }


    // Store
    public function store(Request $request){

        // Validation Post
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ]);

        // Image & Gallery Manage
        $image_name = '';
        $gallery_names = [];

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/posts/'), $image_name);
        }elseif($request->hasFile('gallery')){
            foreach($request->file('gallery') as $gallery){
               $gallery_name = md5(time().rand()) . '.' . $gallery->getClientOriginalExtension();

               $gallery->move(public_path('media/posts/'), $gallery_name);
               array_push($gallery_names, $gallery_name);

            }
        }


        //Video Link Format
        $file_array = explode('/', $request->video);
        if( in_array('vimeo.com', $file_array) ){
            $link = str_replace('vimeo.com/', 'player.vimeo.com/video/', $request->video);
        }elseif(in_array('www.youtube.com', $file_array)){
            $link = str_replace('watch?v=', 'embed/', $request->video);
        }else{
            $link = 'Link format not correct';
        }


        // Featured Ready
        $featured = [
            'type' => $request->radio,
            'image' => $image_name,
            'gallery' => $gallery_names,
            'video' => $link,
            'audio' => $request->audio,
        ];

        // Create Post
        Post::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'featured' => json_encode($featured, JSON_UNESCAPED_SLASHES),
        ]);
        return back();
    }
}
