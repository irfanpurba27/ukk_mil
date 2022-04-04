<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Fkamar;
use App\Models\Fhotel;
use App\Models\User;


class TamuController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


        public function index(User $user){

            $room= Room::all();
            $user=User::All();
            $data = array([
                
            ]);
            return view('tamu')->with('data', $data);
        }

        public function kamar(Fkamar $fkamar){
            $fkamar = Fkamar::all();
            $room = Room::all();
            $room = Room::where('id', 'like', '%'.$fkamar->tipe.'%')->get();
            $data = array(
                'room'     => $room,
                'fkamar' =>$fkamar
            );
            return view('tamu.kamar')->with('data', $data);
        }

        public function hotel(Request $request){
            $fhotel = Fhotel::All();
            return view('tamu',compact('fhotel','request'));
        }

        public function edit(Reservasi $reservasi){
           $reservasi=Reservasi::All();
            $data = array(
                'reservasi'     => $reservasi,
            );
            return view('layouts.nav')->with('data', $data);
        }


    
}
