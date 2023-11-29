<?php

namespace App\Http\Controllers;

use App\Models\RoomSpace;
use Illuminate\Http\Request;

class RoomSpaceController extends Controller
{
    public function create()
    {
        return view("roomSpace.create");
    }
    public function index()
    {
        $valueData = RoomSpace::latest()->get();

        return view('roomSpace.index', [
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
            'space_image' => 'nullable',

        ]);



        // Initialize $fileName
        $fileName = null;

        // Check if an image is provided
        if ($request->hasFile('space_image')) {
            $fileName = time() . '.' . $request->space_image->getClientOriginalExtension();
            $request->space_image->storeAs('public/images', $fileName);
        }

        RoomSpace::create([
            'location' => $request->location,
            'rent' => $request->rent,
            'status' => $request->status,
            'tax' => $request->tax,
            'number' => $request->number,
            'room_type' => $request->room_type,
            'space_image' => $fileName,


        ]);

        return back()->with('success', 'Data created successfully');
    }
}
