@extends('layouts.admin')
   
@section('content')


    <style>
    .tabell{
        border-radius:10px;
        margin-top:50px;
        width:1300px;
        height:450px;
      }
    }
</style>

<center>
    <div class="tabell">

        <h1>
          Fasilitas Kamar
         
        </h1>

    
 
    <table class="table table-hover">
  <thead> 
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:left">Tambah Fasilitas</button>
    <tr class="bg-primary" style="color:white">
      <br><br><br>
      <th scope="col">#</th>   
      <th scope="col">Tipe Kamar</th>
      <th scope="col">Fasilita Kamar</th>
      <th scope="col">Action</th>
  
    </tr>
  </thead>
  <tbody>
  @foreach($fkamar as $key=>$fkamar)
        
        <tr>
            <td>{{$key+1}}</td>
            <td> {{ $fkamar->tipe}} </td>
           <td> {{ $fkamar->nama}} </td>
            
            <td>
            <a href="{{ route('fkamar.edit', $fkamar) }}" class="btn btn-primary  btn-sm" style="float:left;color: white">Ubah</a>
            

            <form action="{{ route('fkamar.destroy',$fkamar) }}" method="post">
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
   <center> <b>
Fasilitas Kamar</b></center>
  </div>
  <div class="card-body">
    
  <div class="card-body">

      <form action="{{ url('fasilitas-kamar/create') }}" method="post">
        {{ csrf_field() }}
            

            <div class="form-group">
              <input type="text" class="form-control" name="nama" placeholder="Facility Name">
            </div>

          <br>
           <select name="tipe" id="" class="form-control">
                @foreach($room as $c1)
                <option value="<?=$c1->keterangan?>"><?=$c1->keterangan?></option>
                @endforeach
              </select>
           
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