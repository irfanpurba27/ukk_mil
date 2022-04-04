@extends('layouts.admin')
   
@section('content')

<style>
    .edit{
        border-radius:10px;
        margin-top:50px;
        width:500px;
        height:450px;
        
    }
  
    }
</style>

<center>
 <div class="edit">
      
 <div class="modal-body">
      <div class="card">
  <div class="card-header">
   <center> <h1><b>Ubah Fasilitas</b></h1></center>
  </div>
  <div class="card-body">
    
  <div class="card-body">

      <form action="{{ route('fhotel.update',$fhotel) }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
          {{ method_field('PATCH') }}
            
            <div class="form-group">
              <label for=""style="float:left">Fasilitas Hotel</label>
              <input type="text" class="form-control" name="fhotel" placeholder="" value="{{$fhotel->fhotel}}">
            </div>
<br>
            <div class="form-group">
              <label for=""style="float:left">Keterangan</label>
              <textarea type="text" class="form-control" name="keterangan" placeholder="" value="">{{$fhotel->keterangan}}</textarea>
            </div>
<br>
        


           
          </div>
          <div class="modal-footer">
          <a href="{{ url('fasilitas-hotel') }}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close</button></a>
        
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
        
</div>
  </div>
</div>
</div>

</center>

@endsection