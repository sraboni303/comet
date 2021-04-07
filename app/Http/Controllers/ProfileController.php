<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function showUserProfile(){
        return view('backend.profile')->with('user', auth()->user());
    }

    public function update(Request $request){
        $user =  User::find(auth()->user()->id);

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->update();
        return true;
    }
}
