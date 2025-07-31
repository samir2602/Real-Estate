<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Developer;
use Illuminate\Support\Str;

class DeveloperController extends Controller
{
    public function AllDeveloper(){
        $developer = Developer::latest()->get();
        return view('backend.developer.all_developer', compact('developer'));
    }

    public function AddDeveloper(){
        return view('backend.developer.add_developer');
    }

    public function StoreDeveloper(Request $request){
        $request->validate([
            'developer_name' => 'required|unique:developers',            
        ]);

        $data = $request->all();
        $data['developer_slug'] = Str::slug($request->developer_name, '-');
        $insert_developer = Developer::create($data);

        if( $request->file('developer_image')){
            $file = $request->file('developer_image');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('uploads/developer_image/'.$insert_developer->id), $filename);
            Developer::findOrFail($insert_developer->id)->update([
                'developer_image' => $filename
            ]);
        }

        $notification = array(
            'message' => 'Developer Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.developer')->with($notification);
    }

    public function EditDeveloper($id){
        $developer_data = Developer::findOrFail($id);
        return view('backend.developer.edit_developer', compact('developer_data'));
    }

    public function UpdateDeveloper(Request $request){
        $request->validate([
            'developer_name' => 'required',
        ]);

        $id = $request->id;
        $developer_data = Developer::find($id);
        $data = $request->all();
        $data['developer_slug'] = Str::slug($data['developer_name'], '-');
        
        if( $request->file('developer_image')){
            @unlink(public_path('uploads/developer_image/'.$id.'/'.$developer_data->developer_image));
            $file = $request->file('developer_image');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('uploads/developer_image/'.$id),$filename);
            $data['developer_image'] = $filename;
        }
        
        Developer::findOrfail($data['id'])->update($data);

        $notification = array(
            'message' => 'Developer Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.developer')->with($notification);
    }

    public function DeleteDeveloper($id){
        $developer_date = Developer::find($id);
        @unlink(public_path('uploads/developer_image/'.$id.'/'.$developer_data->developer_image));

        Developer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Developer Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.developer')->with($notification);
    }

}
