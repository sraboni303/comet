<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Role Page
    public function showRolePage(){
        return view('backend.role');
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


    // all
    public function all(){

        $records = Role::all();
        $output = '';
        $i = 1;

        foreach($records as $record){
            $get_per = json_decode($record->permissions);
            $permission = implode(', ', $get_per);

            $output .= '<tr>';
            $output .= '<td>'. $i .'</td>';
            $output .= '<td>'. $record->name .'</td>';
            $output .= '<td>'. $record->slug .'</td>';
            $output .= '<td>'. $permission .'</td>';
            $output .= '<td>
                            <div class="status-toggle">
                                <input type="checkbox" role_id="'. $record->id .'" id="status_'.$i.'" class="check role_check" '. ( $record->status == true ? "checked" : "") .'>
                                <label for="status_'.$i.'" class="checktoggle">checkbox</label>
                            </div>
                        </td>';
            $output .= '<td class="text-right">
                            <div class="actions">
                                <a role_edit_id="'. $record->id .'" class="btn btn-sm bg-success-light role_edit_btn" href="#">
                                    <i class="fe fe-pencil"></i> Edit
                                </a>
                                <a role_delete_id="'. $record->id .'" href="#" class="btn btn-sm bg-danger-light role_delete_btn">
                                    <i class="fe fe-trash"></i> Delete
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
        $user = Role::find($id);

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
        $user = Role::find($id);

        $per = json_decode($user->permissions);

        $one = (in_array("One", $per)) ? "checked" : "";
        $two = (in_array("Two", $per)) ? "checked" : "";
        $three = (in_array("Three", $per)) ? "checked" : "";
        $four = (in_array("Four", $per)) ? "checked" : "";
        $five = (in_array("Five", $per)) ? "checked" : "";


        $permissions =
        '<label class="list-group-item pl-4">
            <input '. $one .' name="edit_per[]" class="form-check-input me-1" type="checkbox" value="One">
            One
        </label>
        <label class="list-group-item pl-4">
            <input '. $two .' name="edit_per[]" class="form-check-input me-1" type="checkbox" value="Two">
            Two
        </label>
        <label class="list-group-item pl-4">
            <input '. $three .' name="edit_per[]" class="form-check-input me-1" type="checkbox" value="Three">
            Three
        </label>
        <label class="list-group-item pl-4">
            <input '. $four .' name="edit_per[]" class="form-check-input me-1" type="checkbox" value="Four">
            Four
        </label>
        <label class="list-group-item pl-4">
            <input '. $five .' name="edit_per[]" class="form-check-input me-1" type="checkbox" value="Five">
            Five
        </label>';


        return [
            'id' => $user->id,
            'name' => $user->name,
            'permissions' => $permissions,
        ];
    }


    // update
    public function update(Request $request){
        $id = $request->input('get_id');
        $user = Role::find($id);
        $user->name = $request->input('name');
        $user->slug = Str::slug($request->input('name'));
        $user->permissions =json_encode($request->edit_per);
        $user->update();
        return true;
    }


    // delete
    public function delete($id){
        $find = Role::find($id);
        $find->delete();
        return true;
    }


}
