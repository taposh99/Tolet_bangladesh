<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BedController extends Controller
{
    public function create(){
        return view("bedSpace.create");
    }
}
