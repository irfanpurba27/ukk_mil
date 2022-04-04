@extends('layouts.nav')

@section('content')

 <style>
    .reservasi{
        border-radius:10px;
        margin-top:50px;
        width:1300px;
        height:450px;
    }
</style>
<center>
    <div class="reservasi">
    
   <center> <h1><b>Reservasi</b></h1></center>
 
    <table class="table table-hover">
  <thead> 
  <tr class="bg-primary" style="color:white;">
        <th scope="col">Nama Tamu</th>
        <th scope="col">Tanggal cek in</th>
        <th scope="col">Tanggal cek out</th>
        <th scope="col">Cetak</th>

        </tr>
  </thead>
  <tbody>
  @foreach ($reservasis as $res)
  <tr>
       <td>{{ $res->namatam }}</td>
        <td>{{ $res->chekin }}</td>
        <td>{{ $res->chekout }}</td>
        <td>
            <a target="_blank" href="/tamu/cetak/{{ $res->id }} " class="btn btn-sm">cetak</a>
       </td>   
       </tr>
        @endforeach
  </tbody>
</table>
    </div>
</center>
@include('sweetalert::alert')

@endsection