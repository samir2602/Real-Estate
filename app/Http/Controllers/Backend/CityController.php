<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function AllCities(){
        $cities = City::latest()->get();
        return view('backend.city.all_city', compact('cities'));
    }

    public function AddCities(){
        return view('backend.city.add_city');
    }

    public function StoreCities(Request $request){
        $validate = $request->validate([
            'city_name' => 'required|unique:cities'
        ]);
        
        City::create($request->all());

        $notification = array(
            'message' => 'City Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.cities')->with($notification);
    }

    public function EditCities($id){
        $city_data = City::findOrFail($id);
        return view('backend.city.edit_city', compact('city_data'));
    }

    public function UpdateCities(Request $request){
        $validate = $request->validate([
            'city_name' => 'required|unique:cities'
        ]);

        City::findOrFail($request->id)->update($request->all());

        $notification = array(
            'message' => 'City updated successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.cities')->with($notification);
    }

    public function DeleteCities($id){
        City::findOrFail($id)->delete();

        $notification = array(
            'message' => 'City Deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.cities')->with($notification);
    }
}
