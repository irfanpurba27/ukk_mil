<?php

namespace App\Http\Controllers;

use App\Models\reservasi;
use Illuminate\Http\Request;
use App\Models\room;
use App\Models\fhotel;
use App\Models\fkamar;
use App\Models\User;
use DB;

class ReservasiController extends Controller
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
    
    public function index()
    {
        $room = Room::All();
        $reservasi = Reservasi::All(); 
        $fhotel = fhotel::All(); 

        $data = array(
            'room' => $room,
            'reservasi' => $reservasi,
            'fhotel' => $fhotel,
        );

        $reservasi = DB::table('reservasis')
        ->join('rooms', 'rooms.keterangan', '=', 'reservasis.tipe')
        ->get();

        $superior = DB::table('fkamars')->where('tipe', 'Superior')->get();
        $deluxe = DB::table('fkamars')->where('tipe', 'Deluxe')->get();
        return view('tamu',compact('room','deluxe','superior','fhotel','reservasi'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function cetak()
    {
        $test = auth()->user()->id;
        $reservasi =DB::table('reservasis')->where('id_user', $test)->get();
        return view('tamu.cetak', ['reservasis' => $reservasi]);
    }

    public function cetaksatu($id)
    {
         $reservasi = DB::table('reservasis')->where('id', $id)->get();
        return view('tamu.cetaksatu', ['reservasis' => $reservasi]);
    }

    public function kamar(Fkamar $fkamar)
    {   
        $superior = DB::table('fkamars')->where('tipe', 'Superior')->get();

        $deluxe = DB::table('fkamars')->where('tipe', 'Deluxe')->get();

        return view('tamu', compact('superior', 'deluxe'));
    }

    public function index2(Request $request)
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'chekin' => 'required|date',
            'chekout' => 'required|date|after_or_equal:chekin',
            'total' => 'required|min:1',
            'namapem' => 'required|regex:/^([a-zA-Z]+)*$/',
            'email' => 'required|email',
            'no_hp' => 'required',
            'tipe' => 'required'
        ]);

        $room = Room::All();
        $user = User::All();
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
        $user = $request->tipe;

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
            'id_user'       => auth()->id(),
            
        ]);
        return redirect('tamu/cetak')->withToastSuccess('Terimakasi Atas Kunjungan Anda');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function show(reservasi $reservasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservasi $reservasi){
        $reservasi=Reservasi::All();
         $data = array(
             'reservasi'     => $reservasi,
         );
         return view('tamu.kamar')->with('data', $data);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reservasi $reservasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservasi::where('id',$id)->delete();
        return redirect('/resepsionis')->withToastSuccess('Chek out Data successfully');
    }
}
