<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App\Models\Room;

class TkamarController extends Controller
{
    public function index(){
        $data = Room::all();

        return view('tamu.kamar')->with('data', $data);
    }
}
