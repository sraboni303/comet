<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Role Page
    public function showRolePage(){
        $data = Role::latest()->where('status', true)->get();
        return view('backend.role', [
            'all_data' => $data
        ]);
    }

    // Store
    public function store(Request $request){

        Role::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'permissions' => json_encode($request->input('per')),
        ]);

        return true;
    }
}
