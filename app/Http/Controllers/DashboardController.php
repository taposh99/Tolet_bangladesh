<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Flat;
use App\Models\RoomSpace;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    

    public function index()
    {
        $valueData = Bed::latest()->get(); 
        $roomData = RoomSpace::latest()->get(); 
        $flatData = Flat::latest()->get(); 

        return view('welcome', [
            'valueData' => $valueData, 
            'roomData' => $roomData, 
            'flatData' => $flatData, 
        ]);
    }
}
