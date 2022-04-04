<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use File;
use DB;
use Storage;
use App\Models\Fkamar;

class RoomController extends Controller
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

    public function index(){
        $data = Room::all();

        return view('room.index')->with('data', $data);
    }

    

    public function store(Request $request){

        $this->validate($request, [
            'keterangan'    => 'required',
            'jumlah'    => 'required'
        ]);

        $room = Room::All();
        $data = array(
            
            'room' => $room,
                
        );
        $keterangan=$request->keterangan;
        $jumlah = $request->jumlah;
            Room::create([
            'keterangan'          => request('keterangan'),
            'jumlah'           => request('jumlah'),
            
        ]);
        return redirect ('kamar')->withToastSuccess('Data Saved Successfully');
    }

    public function destroy($id)
    {
        $gambar = Room::where('id',$id)->first();
        File::delete('/file_upload'.$gambar->name);
  
        
        $data =DB::table('rooms')
        ->leftJoin('fkamars','rooms.id', '=','fkamars.tipe')
        ->where('rooms.id', $id); 
        DB::table('fkamars')->where('tipe', $id)->delete();                           
        $data->delete();

        return redirect ('kamar')->withToastSuccess('Data Deleted Successfully');
      }

      

      public function edit(Room $room)
      {
          $data = array(
              'title'    => 'room',
              'room'     => $room,   
          );
          return view('room.edit',$data);
      }  

      public function update(Room $room)
    {   
        $room->update([
           
            'keterangan'       => request('keterangan'),
            'jumlah'       => request('jumlah'),
            
        ]);
        return redirect('/kamar')->withToastSuccess('Data Updated successfully');
    }

    public function view(Room $room)
    {
        $data = array(
            'title'    => 'room',
            'room'     => $room,   
        );
        return view('fkamar.room',compact('room'));
    }

}
