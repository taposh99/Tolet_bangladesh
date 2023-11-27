<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use Illuminate\Http\Request;

class BedController extends Controller
{
    public function create(){
        return view("bedSpace.create");
    }

    public function index()
    {
        $valueData = Bed::latest()->get(); // Assuming 'Student' is your Eloquent model for students

        return view('bedSpace.index', [
            'valueData' => $valueData, // Pass the 'students' variable to the view
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'rent' => 'required',
            'status' => 'required',

            'tax' => 'required',
            'number' => 'required',

            'room_type' => 'required',

        ]);

        

        Bed::create([
            'location' => $request->location,
            'rent' => $request->rent,
            'status' => $request->status,
            'tax' => $request->tax,
            'number' => $request->number,
            'room_type' => $request->room_type,

        ]);

        return back()->with('success', 'Data created successfully');
    }

    public function edit($id)
    {
        $editValue = Bed::find($id);
        return view('bedSpace.edit', compact('editValue'));
    }


    
    public function update(Request $request)
    {
        $ValueUpdate = Bed::find($request->bed_space_id);

        $ValueUpdate->update([
            'location' => $request->location,
            'rent' => $request->rent,
            'status' => $request->status,
            'tax' => $request->tax,
            'number' => $request->number,
            'room_type' => $request->room_type,
        ]);

        return back()->with('success', 'Update successfully');
    }

    public function destroy(Request $request)
    {
        Bed::destroy($request->data_delete_id);

        return back()->with('success', 'Deleted successfully');
    }
}
