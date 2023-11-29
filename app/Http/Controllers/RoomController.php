<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RoomController extends Controller
{
    public function create()
    {
        return view("room.create");
    }

    public function index()
    {
        $valueData = Room::latest()->get(); 

        return view('room.index', [
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
            'room_image' => 'nullable',

        ]);

      

        // Initialize $fileName
        $fileName = null;

        // Check if an image is provided
        if ($request->hasFile('room_image')) {
            $fileName = time() . '.' . $request->room_image->getClientOriginalExtension();
            $request->room_image->storeAs('public/images', $fileName);
        }

        Room::create([
            'location' => $request->location,
            'rent' => $request->rent,
            'status' => $request->status,
            'tax' => $request->tax,
            'number' => $request->number,
            'room_type' => $request->room_type,
            'room_image' => $fileName,
         

        ]);

        return back()->with('success', 'Data created successfully');
    }
}
