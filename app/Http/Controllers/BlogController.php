<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showBlogPage(){
        $posts = Post::where([['status', true], ['trash', false]])-> latest()->paginate(2);
        return view('frontend.blog', [
            'posts' => $posts
        ]);
    }
}
