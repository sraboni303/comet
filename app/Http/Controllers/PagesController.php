<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Register Page
    public function showRegisterPage(){
        return view('backend.register');
    }
}
