<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use Illuminate\Http\Request;
use App\Http\Controllers\Stroage;


class BedController extends Controller
{
    public function create()
    {
        return view("bedSpace.create");
    }

    public function index()
    {
        $valueData = Bed::latest()->get(); 

        return view('bedSpace.index', [
            'valueData' => $valueData, 
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
            'image' => 'nullable',

        ]);



        // Initialize $fileName
        $fileName = null;

        // Check if an image is provided
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images', $fileName);
        }

        Bed::create([
            'location' => $request->location,
            'rent' => $request->rent,
            'status' => $request->status,
            'tax' => $request->tax,
            'number' => $request->number,
            'room_type' => $request->room_type,
            'image' => $fileName,


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

        if ($request->hasFile('image')) {
            // Remove the previous image if it exists


            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');

            $ValueUpdate->update([
                'location' => $request->location,
                'rent' => $request->rent,
                'status' => $request->status,
                'tax' => $request->tax,
                'number' => $request->number,
                'room_type' => $request->room_type,
                'image' => $imageName,
            ]);
        } else {
            $ValueUpdate->update([
                'location' => $request->location,
                'rent' => $request->rent,
                'status' => $request->status,
                'tax' => $request->tax,
                'number' => $request->number,
                'room_type' => $request->room_type,
            ]);
        }

        return back()->with('success', 'Update successfully');
    }

    public function destroy(Request $request)
    {
        Bed::destroy($request->data_delete_id);

        return back()->with('success', 'Deleted successfully');
    }
}
