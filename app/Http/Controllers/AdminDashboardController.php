<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Flat;
use App\Models\RoomSpace;
use FFI;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
  
    public function index(){
        $total_bed = Bed::all()->count();
        $total_room = RoomSpace::all()->count();
        $total_flat = Flat::all()->count();

        return view('admin.dashboard.dashboard',[
            'total_bed'=>$total_bed,
            'total_room'=>$total_room,
            'total_flat'=>$total_flat,
        ]);

    }
}
