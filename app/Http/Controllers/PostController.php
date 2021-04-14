<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $created = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'featured' => json_encode($featured, JSON_UNESCAPED_SLASHES),
        ]);

        $created->categories()->attach($request->input('category'));
        $created->tags()->attach($request->input('tag'));

        return back();
    }


    // Post List
    public function postList(){
        $all_data = Post::where('trash', false)->get();
        $trash = Post::where('trash', true)->get()->count();
        $published = Post::where('trash', false)->get()->count();
        return view('backend.list-post', [
            'all_data' => $all_data,
            'trash' => $trash,
            'published' => $published,
        ]);
    }

    // Show Trashes
    public function showTrashes(){
        $data = Post::where('trash', true)->get();
        $trash = Post::where('trash', true)->get()->count();
        $published = Post::where('trash', false)->get()->count();
        return view('backend.trash', [
            'all_data' => $data,
            'trash' => $trash,
            'published' => $published,
        ]);
    }


    // Status: active to inactive
    public function inactive($id){
        $status = Post::find($id);
        $status->status = false;
        $status->update();
        return true;
    }


    // Status: inactive to active
    public function active($id){
        $status = Post::find($id);
        $status->status = true;
        $status->update();
        return true;
    }


    // Trash
    public function trash($id){

        $trash = Post::find($id);

        if($trash->trash == false){
            $trash->trash = true;
            $trash->update();
        }

        return back();
    }


    // Untrash
    public function untrash($id){

        $untrash = Post::find($id);

        if($untrash->trash == true){
            $untrash->trash = false;
            $untrash->update();
        }
        return back();
    }

    // Delete Parmanently
    public function delete($id){
        $delete = Post::find($id);
        $delete->delete();
        return back();
    }


}
