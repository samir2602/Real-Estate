<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\City;
use App\Models\Developer;
use App\Models\Amenities;
use Illuminate\Support\Str;
use File;
use DataTables;
use Spatie\Sitemap\Sitemap;


class PropertyController extends Controller
{
    public function AllProperties(Request $request){
        if($request->ajax()){
            $data = Properties::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $edit_route = route('edit.properties', $row->id);
                $delete_route = route('delete.properties', $row->id);
                $show_route = url('property/'.Str::slug($row->property_name, "-"));
                $action = '<a href="'.$edit_route.'" class="btn btn-primary">Edit</a> ';
                $action .= '<a href="'.$delete_route.'" id="delete" class="btn btn-danger">Delete</a> ';
                $action .= '<a href="'.$show_route.'" target="_blank" class="btn btn-success">Show</a>';
                return $action;
            })
            ->addColumn('property_image', function($row){    
                $property_image = '<img src="'.url('uploads/project_images/'.$row->id.'/'.$row->property_image).'">';
                return $property_image;
            })
            ->rawColumns(['action', 'property_image'])
            ->make(true);
        }
        
        return view('backend.property.all_property');
    }
    
    public function AddProperties(){
        $city = City::latest()->get();
        $developer = Developer::latest()->get();
        $amenities = Amenities::orderBy('amenities_name', 'asc')->latest()->get();
        $property_type = PropertyType::latest()->get();
        return view('backend.property.add_property', compact('city', 'developer', 'amenities', 'property_type'));
    }

    public function ShowProperty($slug){
        $property_data = Properties::where('property_slug', $slug)->first();   
        $developer = Developer::find($property_data->property_developer);
        $amenities_ids = explode(',', $property_data['property_amenities']);
        $amenities = Amenities::whereIn('id', $amenities_ids)->get();
        $property_links = Properties::inRandomOrder()->limit(30)->get();
        return view('pages.property_detail', compact('property_data', 'amenities', 'developer', 'property_links'));
    }

    public function StoreProperties(Request $request){
        
        $request->validate([
            'property_name' => 'required',
            'property_address' => 'required',
            'property_city' => 'required'
        ]);
        
        $data = $request->all();
        
        $data['property_slug'] = Str::slug($request->property_name, "-");
        if(!empty($data['property_amenities'])){
            $data['property_amenities'] = implode(', ', $data['property_amenities']);
        }

        if(!empty($data['property_type'])){
            $data['property_type'] = implode(', ', $data['property_type']);
        }
        $insert_property = Properties::create($data);

        if( $request->file('property_image')){
            $file = $request->file('property_image');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('uploads/project_images/'.$insert_property->id),$filename);                        
            Properties::findOrFail($insert_property->id)->update([
                'property_image' => $filename
            ]);
        }

        if( $request->file('property_brochure')){
            $file = $request->file('property_brochure');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('uploads/project_brochure/'.$insert_property->id),$filename);                        
            Properties::findOrFail($insert_property->id)->update([
                'property_brochure' => $filename
            ]);
        }
        

        $notification = array(
            'message' => 'Property Added Successfully',
            'alert-type' => 'success',
        );

        return redirect('/all/properties')->with($notification);
    }

    public function EditProperties($id){
        $properties = Properties::findOrFail($id);
        $city = City::latest()->get();
        $developer = Developer::latest()->get();
        $amenities = Amenities::orderBy('amenities_name', 'asc')->latest()->get();
        $prop_types = PropertyType::latest()->get();
        return view('backend.property.edit_property', compact('properties', 'city', 'developer', 'amenities', 'prop_types'));
    }

    public function UpdateProperties(Request $request){
        $data = $request->all();
        $id = $request->id;
        $property_data = Properties::find($id);
        $data['property_slug'] = Str::slug($data['property_name']);
        if(!empty($data['property_amenities'])){
            $data['property_amenities'] = implode(',', $data['property_amenities']);
        }
        if(!empty($data['property_type'])){
            $data['property_type'] = implode(',', $data['property_type']);
        }

        $data['property_image'] = $property_data->property_image;
        
        if( $request->file('property_image')){
            @unlink(public_path('uploads/project_images/'.$id.'/'.$property_data->property_image));
            $file = $request->file('property_image');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('uploads/project_images/'.$id),$filename);            
            $data['property_image'] = $filename;
        }

        if( $request->file('property_brochure')){
            @unlink(public_path('uploads/project_brochure/'.$id.'/'.$property_data->property_brochure));
            $file = $request->file('property_brochure');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('uploads/project_brochure/'.$id), $filename);
            $data['property_brochure'] = $filename;
        }

        Properties::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Property Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect('/all/properties')->with($notification);
    }

    public function DeleteProperties($id){
        $property_data = Properties::find($id);                
        File::deleteDirectory(public_path('uploads/project_images/'.$id));

        
        Properties::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Property Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function BulkProperty(){
        // Manually create sitemap
        $sitemap = Sitemap::create();

        // Static pages
        $sitemap->add('/');

        // Dynamic pages
        $property = Properties::all();
        foreach ($property as $p) {
            $sitemap->add(url("/property/".$p->property_slug));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));        

    }
}
