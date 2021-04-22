<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showBlogPage()
    {
        $posts = Post::where([['status', true], ['trash', false]])-> latest()->paginate(2);
        return view('frontend.blog', [
            'posts' => $posts
        ]);
    }


    // Search
    public function search(Request $request){

        if(empty($request->search)){
            $posts = '';
        }else{
            $posts = $search = $request->search;
        }

        $posts = Post::where('title', 'LIKE', '%'. $search .'%')->orWhere('content', 'LIKE', '%'. $search .'%')->latest()->paginate();
        return view('frontend.blog-search', [
            'posts' => $posts
        ]);
    }

    // blog search by category
    public function blogCat($slug){
        $cats = Category::where('slug', $slug)->latest()->get();
        return $cats->posts;
    }











}
