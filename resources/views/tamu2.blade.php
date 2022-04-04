@extends('layouts.nav')

@section('content')
<!-- banner -->
<div class="banner">    
  <center>	  
    <img src="{{asset('images/photos/banner.jpg')}}"  class="img-responsive" alt="slide">
    </center> 
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1  class="animated fadeInDown">Best hotel in DBTC</h1>
                <p class="animated fadeInUp">Most luxurious hotel of DBTC with the royal treatments and excellent customer service.</p>   

               
            </div>
       
        </div>
    </div>
</div>
<!-- banner-->

   

<br><br><br>
 

<!-- reservation-information -->
<div id="reservasi" class="spacer reserve-info ">
    <div class="card" style="width:auto;" >
  <div class="card-body">
  
    <form class="row g-3 needs-validation"  Action="{{url('guest/create')}}" Method="Post" style="margin-left:40px;margin-right:40px"> 
        {{ csrf_field() }}
    
        <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Tanggal Chek In</label>
    <input type="date" class="form-control" id="chekin"  required name="chekin">
  </div>

  <div class="col-md-4">
    <label for="validationCustom02" class="form-label"> Tanggal Chek out</label>
    <input type="date" class="form-control" id="chekout"  required name="chekout">
  </div>
 
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Total Room</label>
    <input type="number" class="form-control" id="validationCustom02"  style="" required name="total">
    <div class="valid-feedback">
    </div>
  </div>
 
 <button type="button" class="btn btn-primary bi bi-search" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:left">Pesan <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
  </div>
    </div>

  </div>
</div>

  


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
   Form Pemesanan
  </div>
  <div class="card-body">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Pemesan :</label>
                <input type="text" class="form-control" id="exampleInputEmail1" required name="namapem">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email :</label>
                <input type="email" class="form-control" id="exampleInputEmail1" required name="email">
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No Handphone :</label>
                <input type="number" class="form-control" id="exampleInputEmail1" required name="no_hp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Tamu :</label>
                <input type="text" class="form-control" id="exampleInputEmail1" required name="namatam">
            </div>

            <div class="mb-3">
            <select name="tipe" id="" class="form-control">
                @foreach($room as $c1)
                <option value="<?=$c1->keterangan?>"><?=$c1->keterangan?></option>
                @endforeach
              </select>
            </div>

          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="">Konfirm</button>
        </form>
      </div>
        
</div>
  </div>
</div>
      </div>
    </div>
  </div>
</div>

<br><br>
<!-- Tentang kami -->
<div id="about" class="spacer reserve-info ">
<center>
  <div class="col-md-4" wi>
    <h1 class="form-label">About Us</h1>
  </div>
    <p>The DBTC Hotel is located on Margonda Street Depok, another landmark of Depok City, the Southern Jakarta’s premier choice for business travelers on short and long term assignments and the very best meetings and events location in the area. The hotel is strategically closed to South Jakarta business district TB. Simatupang, Jl. Raya Bogor, University of Indonesia and Depok Residential area. It takes 10 minutes only to Jakarta Outer Ring Road Toll, 5 minutes to Cijago Toll Road  and easy access to airport. The hotel is side by side with MARGOCITY Mall, the biggest shopping center in Depok for guests to fulfill their shopping desire.</p>
    </div>
    </center>


    <div id="hotel" class="spacer reserve-info ">
<center>
  <div class="col-md-4">
    <h2 class="form-label">Fasilitas Hotel</h2><br>
  </div></center>
<div class="row" style="margin-left:20px;">
                 @foreach ($fhotel as $key=>$item)
                 <div class="col-md-6" style="width:360px">
                <div class="card  mb-4">
                    <div class="card-body" style="float:left">  <img src="{{asset('fasilitas_hotel')}}/{{$item->file}}" style="width:300px">
                    </div>
                        <div class="card-footer d-flex align-items-center justify-content-between" style="font-size:15px">
                        <p>{{$item->fhotel}}   
                        {{$item->keterangan}}</p>
                     </div>
                </div>
            </div> @endforeach
            </div>
            </div> 
    </div>
  



@include('sweetalert::alert')
@endsection
