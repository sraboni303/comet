<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Show Page
    public function showProfilePage(){
        return view('backend.profile');
    }
}
