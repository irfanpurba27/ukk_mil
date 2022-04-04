@extends('layouts.admin')
   
@section('content')


    <style>
    .tabell{
        border-radius:10px;
        margin-top:50px;
        width:1000px;
        height:450px;
      }
    
</style>
  <div class="tabell">

 <div class="row">
    <div class="col-xl-3 col-md-6"  style="width:800px; margin-left:100px;padding-left:30px;">
      <div class="card  mb-4">
        <div class="card-body"> 
        <img src="{{asset('file_upload/'.$room->file)}}" alt="" style="width:270px;float:left;"><br>
            <b  style="margin-left:20px;font-size:35px">{{$room->keterangan}}</b><br><br>
        <table>
                <tr>@foreach($fkamar as $fkamar)
                  <td><li></li><b style="margin-left:20px;font-size:20px"> {{ $fkamar->nama}}</b></td>
                </tr>@endforeach
              </table>
        </div>  
            <div class="card-footer d-flex align-items-center justify-content-between"> 
             

            <div class="small"><i class="fas fa-angle-right"></i></div>
         </div>
       </div>
    </div>
  </div>
  </div>
@include('sweetalert::alert')

@endsection