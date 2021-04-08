<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Show Page
    public function showPage(){
        return view('backend.tag');
    }


    // Store
    public function store(Request $request){
        Tag::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ]);
        return true;
    }
}
