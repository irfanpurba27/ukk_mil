@extends('layouts.nav')

@section('content')

 <style>
    .tabell{
        border-radius:10px;
        margin-top:50px;
        margin-left:20px;
        width:1000px;
        height:450px;
    }
</style>


<div class="tabell">
<div class="card mb-3" style="max-width: 540px;" style=>
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset('img/deluxe.jpg')}}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Fasilitas Deluxe</h5>
            @foreach($deluxe as $d)
            <li>{{ $d->nama }}</li>
            @endforeach
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 540px;" style=>
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset('img/deluxe.jpg')}}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Fasilitas Superior</h5>
        <br>
            @foreach($superior as $s)
                <li>{{$s->nama}}</li>
            @endforeach
      </div>
    </div>
  </div>
</div>
</div>

    @endsection