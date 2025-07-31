<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenities;

class AmenitiesController extends Controller
{
    public function AllAmenities(){
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('amenities'));
    }

    public function AddAmenities(){
        return view('backend.amenities.add_amenities');
    }

    public function StoreAmenites(Request $request){
        $request->validate([
            'amenities_name' => 'required|unique:amenities|max:100'
        ]);

        Amenities::insert([
            'amenities_name' => $request->amenities_name
        ]);

        $notification = array(
            'message' => 'Property Type Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);
    }

    public function EditAmenities($id){
        $amenities = Amenities::findOrfail($id);
        return view('backend.amenities.edit_amenities', compact('amenities'));
    }

    public function UpdateAmenities(Request $request){        
        $aid = $request->id;

        Amenities::findOrFail($aid)->update([
            'amenities_name' => $request->amenities_name
        ]);

        $notification = array(
            'message' => 'Amenites updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);
    }

    public function DeleteAmenities($id){
        Amenities::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Amenities Deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
