<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Show Page
    public function showPage(){
        return view('backend.category');
    }

    // store
    public function store(Request $request){
        Category::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ]);
        return true;
    }

    // get records
    public function getRecords(){
        $records = Category::all();
        $output = '';
        $i = 1;

        foreach($records as $record){
            $output .= '<tr>';
            $output .= '<td>'. $i .'</td>';
            $output .= '<td>'. $record->name .'</td>';
            $output .= '<td>'. $record->slug .'</td>';
            $output .= '<td>
                            <div class="status-toggle">
                                <input type="checkbox" cat_id="'. $record->id .'" id="status_'.$i.'" class="check cat_check" '. ( $record->status == true ? "checked" : "") .'>
                                <label for="status_'.$i.'" class="checktoggle">checkbox</label>
                            </div>
                        </td>';
            $output .= '<td class="text-right">
                            <div class="actions">
                                <a cat_edit_id="'. $record->id .'" class="btn btn-sm bg-success-light cat_edit_btn" href="#">
                                    <i class="fe fe-pencil"></i> Edit
                                </a>
                                <a cat_delete_id="'. $record->id .'" href="#" class="btn btn-sm bg-danger-light cat_delete_btn">
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
        $user = Category::find($id);

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
        $user = Category::find($id);
        return [
            'id' => $user->id,
            'name' => $user->name,
        ];
    }


    // update
    public function update(Request $request){
        $id = $request->input('get_id');
        $user = Category::find($id);
        $user->name = $request->input('name');
        $user->slug = Str::slug($request->input('name'));
        $user->update();
        return true;
    }



    // delete
    public function delete($id){
        $find = Category::find($id);
        $find->delete();
        return true;
    }











}
