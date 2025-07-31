<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    public function Alltype(){
        $property = PropertyType::latest()->get();
        return view('backend.type.all_type', compact('property'));
    } // End Method

    public function Addtype(){
        return view('backend.type.add_type');
    } // End Method

    public function StoreType(Request $request){
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Property Type Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    } // End Method

    public function EditType($id){
        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type', compact('types'));
    } // End Method

    public function UpdateType(Request $request){
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);
        
        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Poperty Type Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    } // End Method

    public function DeleteType($id){
        PropertyType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property type deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
