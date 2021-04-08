<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    // Show Page
    public function showPage(){
        return view('backend.tag');
    }
}
