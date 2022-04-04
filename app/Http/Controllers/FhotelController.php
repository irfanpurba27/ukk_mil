<?php

namespace App\Http\Controllers;

use App\Models\fhotel;
use File;
use Illuminate\Http\Request;

class FhotelController extends Controller
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
    public function index(Request $request){

        $fhotel = Fhotel::All();

        return view('fhotel.index',compact('fhotel','request'));
    }
     public function create(){
        

    }

    public function store(Request $request){
        $this->validate($request, [
            'file'          => 'required',
            'keterangan'    => 'required',
            'fhotel'    => 'required'
        ]);

        $file           = $request->file('file');
        $nama_file      = $file->getClientOriginalName();
        $file->move('fasilitas_hotel',$file->getClientOriginalName());

        $upload = new Fhotel;
        $upload->file       = $nama_file;
        $upload->keterangan = $request->input('keterangan');
        $upload->fhotel = $request->input('fhotel');

        $upload->save();
        return redirect('/fasilitas-hotel')->withToastSuccess('Data Saved');
        
       
    }
    public function edit(Fhotel $fhotel)
    {

        $data = array(
            'fhotel'       => request('fhotel'),
            'keterangan'       => request('keterangan'),
            'file'       => request('file'),
        );
        return view('fhotel.edit',$data);
        // return view('creator.detail',$data);
    }
    
    public function update(Fhotel $fhotel)
    {   
       

        $fhotel->update([
            'fhotel'          => request('fhotel'),
            'keterangan'       => request('keterangan'),
            
        ]);
        return redirect('/fasilitas-hotel')->withToastSuccess('Data Updated successfully');
    }

    public function destroy($id){
        
        $gambar = Fhotel::where('id',$id)->first();
        File::delete('/fasilitas_hotel'.$gambar->name);
        Fhotel::where('id',$id)->delete();
        return redirect('/fasilitas-hotel')->withToastSuccess('Data deleted successfully');
    }

}
