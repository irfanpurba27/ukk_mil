@extends('layouts.admin')
   
@section('content')

<style>
    .edit{
        border-radius:10px;
        margin-top:50px;
        width:1000px;
        height:450px;
        
    }
  
    
</style>

<center>
 <div class="edit">
      
 <div class="modal-body" style="width:500px">
      <div class="card">
  <div class="card-header">
   <center> <h1><b>Ubah Kamar</b></h1></center>
  </div>
  <div class="card-body">
    
  <div class="card-body">

      <form action="{{ route('room.update',$room) }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
          {{ method_field('PATCH') }}
      
        
            <div class="form-group">
              <label for=""style="float:left">Tipe kamar </label>
              <input type="text" class="form-control" name="keterangan" placeholder="" value="{{$room->keterangan}}">
            </div>
<br>
             <div class="form-group">
              <label for=""style="float:left">Total Room </label>
              <input type="text" class="form-control" name="jumlah" placeholder="" value="{{$room->jumlah}}">
            </div>
          </div>
          <div class="modal-footer">
          <a href="{{ url('kamar') }}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close</button></a>
        
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
        
</div>
  </div>
</div>
</div>

</center>

@endsection