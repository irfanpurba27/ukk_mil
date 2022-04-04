<?php

namespace App\Http\Controllers;

use App\Models\fkamar;
use Illuminate\Http\Request;
use DB;
use App\Models\room;

class FkamarController extends Controller
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
    public function index(Request $request)
    {   
        $room = Room::All();
        $fkamar = Fkamar::All(); 

        $data = array(
            
            'room' => $room,
            'fkamar' => $fkamar,
                
        );

        $fkamar = DB::table('fkamars')
        ->join('rooms', 'rooms.keterangan', '=', 'fkamars.tipe')
        ->get();
        return view('fkamar.index',$data);
    }
     public function create(){

    }
    public function store(Request $request){
        $room = Room::All();
        $data = array(
            
            'room' => $room,
                
        );
        $nama=$request->nama;
        $tipe = $request->tipe;

        $fkamar = fkamar::All(); 
  
            Fkamar::create([
            'nama'          => request('nama'),
            'tipe'           => request('tipe'),
            
        ]);
        return redirect('/fasilitas-kamar')->withToastSuccess('Data Saved');
        
    }
    public function edit(Fkamar $fkamar)
    {
        
        return view('fkamar.edit',compact('fkamar'));
    }


    public function update(fkamar $fkamar)
    {   
        $fkamar->update([
            'nama'      => request('nama'),
            'tipe'      => request('tipe'),
            
        ]);
        return redirect('/fasilitas-kamar')->withToastSuccess('Data Updated successfully');
    }

    public function destroy(Fkamar $fkamar){
        $fkamar->delete();
        return redirect('/fasilitas-kamar')->withToastSuccess('Data deleted successfully');
    }

    public function view(Fkamar $fkamar)
    {
        
        return view('fkamar.room',compact('fkamar'));
    }

}
