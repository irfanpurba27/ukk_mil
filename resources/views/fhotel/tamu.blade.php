@extends('layouts.nav')

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
<div id="information" class="spacer reserve-info ">
<div class="row" style="margin-left:20px;">
@foreach($fhotel as $key=>$fhotel)
 <div class="col-md-6" style="width:360px">
<div class="card  mb-4">
    <div class="card-body" style="float:left">  <img src="{{asset('fasilitas_hotel')}}/{{$fhotel->file}}" style="width:300px">
    </div>
        <div class="card-footer d-flex align-items-center justify-content-between" style="font-size:20px">
            {{$fhotel->fhotel}} <br><br>
            {{$fhotel->keterangan}}
     </div>
</div>
</div> @endforeach
</div>
</div>
</div>
</div>
@endsection