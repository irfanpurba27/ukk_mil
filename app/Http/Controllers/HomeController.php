<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;

class HomeController extends Controller
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
        $reservasi=Reservasi::All();
        if($request->cari){
            $reservasi = Reservasi::where('namatam', 'like', '%'.$request->cari.'%')->get();
           
        } else if($request->date)
        {
        $reservasi = Reservasi::where('chekin', 'like', '%'.$request->date.'%')->get();
          }
        else{
             $data = array(
            'reservasi' => $reservasi,
        );
        }
        return view('resepsionis.home',compact('reservasi','request'));

    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }
    

    public function store(Request $request)
    {
        $room = Room::All();
        $data = array(
            
            'room' => $room,
                
        );
        $chekin=$request->chekin;
        $chekout=$request->chekout;
        $total=$request->total;
        $namapem=$request->namapem;
        $email=$request->email;
        $no_hp=$request->no_hp;
        $namatam=$request->namatam;
        $tipe = $request->tipe;

        $reservasi = Reservasi::All(); 
  
            Reservasi::create([
            'chekin'     => request('chekin'),
            'chekout'    => request('chekout'),
            'total'      => request('total'),
            'namapem'    => request('namapem'),
            'email'      => request('email'),
            'no_hp'      => request('no_hp'),
            'namatam'    => request('namatam'),
            'tipe'       => request('tipe'),
            
        ]);
        return redirect('tamu')->withToastSuccess('Data Sedang Diproses');
    }

    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();
        return redirect('/reservasi')->withToastSuccess('Chekin Data successfully');
    }

    

    
}
