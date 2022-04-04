@extends('layouts.admin')
   
@section('content')

<style>
    .edit{
        border-radius:10px;
        margin-top:50px;
        width:1000px;
        height:450px;
        
    }
  
    }
</style>

<center>
 <div class="edit">
      
 <div class="modal-body">
      <div class="card">
  <div class="card-header">
   <center> <h1><b>Update Kamar</b></h1></center>
  </div>
  <div class="card-body">
    
  <div class="card-body">

      <form action="{{ route('kamar.update',$kamar) }}" method="post">
      {{ csrf_field() }}
          {{ method_field('PATCH') }}
            
            <div class="form-group">
              <label for=""style="float:left">Fasilitas Kamar</label>
              <input type="text" class="form-control" name="nama" placeholder="" value="{{$kamar->tipe}}">
            </div>

             <div class="form-group">
              <label for=""style="float:left">Tipe Fasilitas </label>
              <input type="text" class="form-control" name="tipe" placeholder="" value="{{$kamar->jumlah}}">
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