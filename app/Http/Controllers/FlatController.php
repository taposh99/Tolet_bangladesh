<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use Illuminate\Http\Request;

use App\Http\Controllers\Stroage;

class FlatController extends Controller
{
    public function create()
    {
        return view("flat.create");
    }
    public function index()
    {
        $valueData = Flat::latest()->get();

        return view('flat.index', [
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
            'flat_image' => 'nullable',

        ]);



        // Initialize $fileName
        $fileName = null;

        // Check if an image is provided
        if ($request->hasFile('flat_image')) {
            $fileName = time() . '.' . $request->flat_image->getClientOriginalExtension();
            $request->flat_image->storeAs('public/images', $fileName);
        }

        Flat::create([
            'location' => $request->location,
            'rent' => $request->rent,
            'status' => $request->status,
            'tax' => $request->tax,
            'number' => $request->number,
            'room_type' => $request->room_type,
            'flat_image' => $fileName,


        ]);

        return back()->with('success', 'Data created successfully');
    }


    public function edit($id)
    {
        $editValue = Flat::find($id);
        return view('flatSpace.edit', compact('editValue'));
    }


    public function update(Request $request)
    {


        $ValueUpdate = Flat::find($request->flat_space_id);

        if ($request->hasFile('flat_image')) {
            // Remove the previous image if it exists


            $flat_image = $request->file('flat_image');
            $imageName = time() . '.' . $flat_image->getClientOriginalExtension();
            $flat_image->storeAs('images', $imageName, 'public');

            $ValueUpdate->update([
                'location' => $request->location,
                'rent' => $request->rent,
                'status' => $request->status,
                'tax' => $request->tax,
                'number' => $request->number,
                'room_type' => $request->room_type,
                'flat_image' => $imageName,
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
        Flat::destroy($request->data_delete_id);

        return back()->with('success', 'Deleted successfully');
    }
}
