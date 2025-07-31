<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function AllState(){
        $state = State::latest()->get();
        return view('backend.state.all_state', compact('state'));
    }

    public function AddState(){
        return view('backend.state.add_state');
    }

    public function StoreState(Request $request){
        $validate = $request->validate([
            'state_name' => 'required|unique:states'
        ]);

        State::create($request->all());

        $notification = array(
            'message' => 'State added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with($notification);
    }

    public function EditState($id){
        $state_data = State::findOrFail($id);
        return view('backend.state.edit_state', compact('state_data'));
    }

    public function UpdateState(Request $request){
        $validate = $request->validate([
            'state_name' => 'required|unique:states'
        ]);

        State::findOrFail($request->id)->update($request->all());

        $notification = array(
            'message' => 'State updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with('notification');
    }

    public function DeleteState($id){
        State::findOrFail($id)->delete();

        $notification = array(
            'message' => 'State deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with($notification);
    }
}
