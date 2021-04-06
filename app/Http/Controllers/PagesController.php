<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Index Page
    public function showIndexPage(){
        return view('backend.index');
    }

    // Register Page
    public function showRegisterPage(){
        return view('backend.register');
    }

    // Login Page
    public function showLoginPage(){
        return view('backend.login');
    }

    // Role Page
    public function showRolePage(){
        return view('backend.role');
    }
}
