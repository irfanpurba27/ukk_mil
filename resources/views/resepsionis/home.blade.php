@extends('layouts.resepsionis')

@section('content')

<style>
    .reservasi{
        border-radius:10px;
        margin-top:50px;
        width:1300px;
        height:450px;
        margin-left:20px;
      }
    
</style>



    <div class="reservasi">

   <center> <h1>Data Reservasi </h1></center>
    
<br>

<form action="{{ url('resepsionis') }}" Method="GET">
  <input type="submit" value="Cari tangal cek in"  class="btn btn-primary" style="float:left">
  <input type="date" name="date" class="form-control" style="width:200px;float:left" value="{{$request->date }}">
  </form>
  
  <br><br>
  
  <form action="{{ url('resepsionis') }}" Method="GET">
  
  <input type="submit" value="Cari" class="btn btn-primary" style="float:left;">
  <input type="text" placeholder="Search Nama Tamu" name="cari" value="{{ $request->cari }}" class="form-control" style="width:200px;">
   
  </form><br>
  <a href="{{url('resepsionis')}}" class="btn btn-primary" style="float:left;">Reset</a> 
  <center>
   <br><br>
    <table class="table table-hover">
  <thead> 
    <tr class="bg-primary" style="color:white">
      
      <th scope="col">#</th>
      <th scope="col">Nama Tamu</th>
      <th scope="col">Tanggal Cek in </th>
      <th scope="col">Tanggal Cek out</th>
      <th scope="col">Action </th>

  
    </tr>
  </thead>
  <tbody>
 
         @foreach($reservasi as $key=>$reservasi)
        <tr>
            <td>{{ $key+1 }} </td>
            <td>{{ $reservasi->namatam }}</td>
            <td>{{ $reservasi->chekin }} </td>
            <td>{{ $reservasi->chekout }} </td>
            <td>
              <form action="{{ route('resepsionis.destroy',$reservasi) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 1px"
                onclick="return confirm('Chek out data?')"> Check-out Data</button>
    </form>
        </td>
        </tr>
          @endforeach
  </tbody>
</table>
</center>
@include('sweetalert::alert')

@endsection
