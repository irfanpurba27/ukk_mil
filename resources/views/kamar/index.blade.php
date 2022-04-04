@extends('layouts.admin')
   
@section('content')


    <style>
    .tabell{
        border-radius :10px;
        margin-top    :50px;
        width         :1000px;
        height        :450px;  
    }

    }
</style>

<center>
    <div class="tabell">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:left">
  Tambah Fasilitas
</button>
<br><br>  
    <table class="table table-hover">
  <thead> 
    <tr class="bg-primary" style="color:white">
    
      <th scope="col">Tipe Kamar</th>
      <th scope="col">Jumlah Kamar</th>
      <th scope="col">Action</th>
  
    </tr>
  </thead>
  <tbody>
 -->
 </tbody>
  
  <tbody>
   
  
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
   <center> <h1><b>Tambah Fasilitas</b></h1></center>
  </div>
  <div class="card-body">
    
  <div class="card-body">

      <form action="{{ url('kamar/create') }}" method="post">
        {{ csrf_field() }}
            

            <div class="form-group">
              <label for="">Tipe Kamar</label>
              <input type="text" class="form-control" name="tipe" placeholder="">
            </div>

            <div class="form-group">
              <label for="">Jumlah Kamar</label>
              <input type="text" class="form-control" name="jumlah" placeholder="">
            </div>

          <div class="form-group">
              <label for=""></label>
              <input type="file" class="form-control" name="gambar" placeholder="">
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