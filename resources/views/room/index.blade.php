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
   
    <h1> Daftar Kamar </h1> 
 
        <button type="button" class="btn btn-primary btm-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:left">Tambah kamar</button>  
        <br><br><br>
    <table class="table table-hover">
  <thead> 
     <tr class="bg-primary" style="color:white">
    
      <th scope="col">#</th>
      <th scope="col">Tipe Kamar</th>
      <th scope="col">Jumlah Kamar</th>
      <th scope="col">Action </th>

    </tr>
  </thead>
  <tbody>
  @foreach ($data as $key=>$item)
        
        <tr>
            <td>{{$key+1}}</td>
            <td> {{$item->keterangan}} </td>
            <td> {{$item->jumlah}} Ruangan </td>
            <td>
            <a href="{{ route('room.edit', $item) }}" class="btn btn-primary  btn-sm" style="float:left;color: white">Ubah</a> 

            <form action="{{ route('room.destroy',$item) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-sm" style="" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> Hapus</button>
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
                             <center><b>Tambah Kamar </b></center>
                                 </div>
                                  <div class="card-body">
                        

                        {{-- jika mengirim file wajib menggunakan enctype="multipart/form-data" --}}
        <form action="{{url('room/create')}}" method="post" enctype="multipart/form-data">
             @csrf

      
            {{-- pesan error  --}}
            @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <div class="form-group">
            <div class="input-group mb-3">
              <select class="form-select" id="inputGroupSelect01" name="keterangan">
            
                <option >Superior</option>
                <option >Deluxe</option>
              </select>
            </div>
                        {{-- pesan error  --}}
            @error('keterangan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <Input type="number" name="jumlah" class="form-control" placeholder="Total" require>
            {{-- pesan error  --}}
            @error('jumlah')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
            <br>
            <button type="submit" id="tombol-simpan" class="btn btn-primary">Save</button>
        </form>

                        </div>
                          </div>
                            </div>
                  
                         </div>
                      </div>
                     </div>
                

       
@include('sweetalert::alert')

@endsection