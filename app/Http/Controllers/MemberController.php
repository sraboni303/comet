<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Show Page
    public function showPage(){
        $roles = Role::all()->where('status', true);
        return view('backend.member', [
            'roles' => $roles
        ]);
    }


    // Store
    public function store(Request $request){

        $photo = '';

        // Photo Processing
        if($request -> hasFile('photo')){
            $file = $request -> file('photo');
            $photo = md5(time(). rand()) . '.' . $file -> getClientOriginalExtension();
            $file -> move(public_path('media/members'), $photo);
        }

        // store
        Member::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'photo' => $photo,
        ]);
        return true;
    }



    // get records
    public function all(){
        $records = Member::all();
        $output = '';
        $i = 1;

        foreach($records as $record){
            $output .= '<tr>';
            $output .= '<td>'. $i .'</td>';
            $output .= '<td>'. $record->name .'</td>';
            $output .= '<td>'. $record->email .'</td>';
            $output .= '<td>'. $record->role .'</td>';
            $output .= '<td> <img style="width:50px;height:50px;border-radius:50%" src="media/members/'. $record->photo .'"> </td>';
            $output .= '<td>
                            <div class="status-toggle">
                                <input type="checkbox" member_id="'. $record->id .'" id="status_'.$i.'" class="check member_check" '. ( $record->status == true ? "checked" : "") .'>
                                <label for="status_'.$i.'" class="checktoggle">checkbox</label>
                            </div>
                        </td>';
            $output .= '<td class="text-right">
                            <div class="actions">
                                <a member_view_id="'. $record->id .'" href="#" class="btn btn-sm bg-warning-light member_view_btn">
                                    <i class="fe fe-eye"></i>
                                </a>
                                <a member_edit_id="'. $record->id .'" class="btn btn-sm bg-success-light member_edit_btn" href="#">
                                    <i class="fe fe-pencil"></i>
                                </a>
                                <a member_delete_id="'. $record->id .'" href="#" class="btn btn-sm bg-danger-light member_delete_btn">
                                    <i class="fe fe-trash"></i>
                                </a>

                            </div>
                        </td>';
            $output .= '</tr>';

            $i++;
        }
        return $output;
    }



    // Status
    public function status($id){
        $user = Member::find($id);

        if($user->status == true){
            $user->status = false;
        }else{
            $user->status = true;
        }
        $user->update();
        return true;
    }



    // Edit
    public function edit($id){
        $user = Member::find($id);
        return [
            'id' => $user->id,
            'name' => $user->name,
        ];
    }


    // update
    public function update(Request $request){
        $id = $request->input('get_id');
        $user = Member::find($id);

        $user->name = $request->input('name');
        $user->update();
        return true;
    }



    // delete
    public function delete($id){
        $find = Member::find($id);
        $find->delete();

        // remove deleted photo
        if(file_exists('media/members/' . $find->photo)){
            unlink('media/members/' . $find->photo);
        }
        return true;
    }




}
