@extends('layouts.admin')
   
@section('content')


    <style>
    .tabell{
        border-radius:10px;
        margin-top:50px;
        width:1300px;
        height:450px;
    }
</style>

<center>
    <div class="tabell">
  
            <h1>Fasilitas Hotel</h1>
   

    <table class="table table-hover" >
  <thead>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:left">Tambah Fasilitas Hotel
</button><br><br><br>
    <tr class="bg-primary" style="color:white">
    
      <th scope="col">#</th>
      <th scope="col">Nama Fasilitas</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Gambar</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($fhotel as $key=>$fhotel)
        <tr>
            <td>{{$key+1}}</td>
            <td> {{ $fhotel->fhotel}} </td>
            <td> {{ $fhotel->keterangan}} </td>
            <td> <img src="{{asset('fasilitas_hotel')}}/{{$fhotel->file}}" style="width:80px">  </td>
            <td>
            <a href="{{ route('fhotel.edit', $fhotel) }}" class="btn btn-primary  btn-sm" style="float:left;color: white">Ubah</a>


            <form action="{{ route('fhotel.destroy',$fhotel) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 1px"
                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> Hapus</button>
    </form>
        </td>
        </tr>
        @endforeach
 </tbody>
</table>
    </div>
</center>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DBTC Hotel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
    
      <div class="card">
  <div class="card-header">
   <center> <b>Tambah Fasilitas</b></center>
  </div>
  <div class="card-body">
    
  <div class="card-body">

      <form action="{{ url('fasilitas-hotel/create') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            

            <div class="form-group">
              <label for="">Fasilitas</label>
              <input type="text" class="form-control" name="fhotel" placeholder="">
            </div>
<br>
            <div class="form-group">
              <label for="">Keterangan</label>
              <textarea type="text" class="form-control" name="keterangan" placeholder=""></textarea>
            </div>
<br>
            <div class="form-group">
              <label for="">Image</label>
              <input type="file" class="form-control" name="file" placeholder="" id="file">
            </div>

           
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
        
</div>
  </div>
</div>
      </div>
    </div>
  </div>
</div>
@include('sweetalert::alert')

@endsection