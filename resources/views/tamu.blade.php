@extends('layouts.nav')

@section('content')

<!-- end header inner -->
<!-- end header -->
<!-- banner -->
<section class="banner_main">
  <div class="container">
     <div class="row">
        <div class="col-md-12">
           <div class="text-bg">
              <div class="padding_lert">
                 <h1>WELCOME TO HOTEL HEBAT </h1>
                 <span>Since 2019</span>
                 <p>Ada berbagai macam bagian dari hotel kami yang tersedia, tetapi sebagian besar telah mengalami beberapa bentuk perubahan, dengan humor yang disuntikkan, atau kata-kata acak yang tidak terlihat sedikit pun dapat dipercaya.</p>
              </div>
           </div>
        </div>
     </div>
  </div>
</section>
<!-- end banner -->
<!-- form_lebal -->
<section>
  <div class="container">
     <div class="row">
        <div class="col-md-12">
           <form class="form_book"  Action="{{url('guest/create')}}" Method="Post" >
            {{ csrf_field() }}
              <div class="row">
                 <div class="col-md-3">
                    <label class="date">Tangal Cek in</label>
                    <input class="book_n"  type="date"  name="chekin">
                 </div>
                 <div class="col-md-3">
                    <label class="date">Tanggal Cek out</label>
                    <input class="book_n"  type="date" name="chekout">
                 </div>
                 <div class="col-md-3">
                    <label class="date">Jumlah kamar</label>
                    <input class="book_n" type="number" name="total">
                 </div>
                 <div class="col-md-3">
                    <button class="book_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Pesan</button>
                 </div>
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Maaf</strong> Data yang anda input salah.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
              </div>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="card-header">
                        Form Pemesanan
                       </div><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="card">
              
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
                            <label for="exampleInputEmail1" class="form-label">Tipe Kamar :</label>
                          <select name="tipe" id="" class="form-control">
                            <option value=""></option>
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
              </div></div></div></div></div></div>

           </form>
        </div>
     </div>
  </div>
</section>
<!-- end form_lebal -->
<!-- choose  section -->
<div class="choose" id="kamar">
  <div class="container">
     <div class="row">
        <div class="col-md-6">
           <div class="choose_box">
              <div class="titlepage">
                 <h2><span class="text_norlam">Tipe</span> <br>Superior</h2>
              </div>
              <p>Superior room merupakan jenis kamar yang lebih baik dari standard room, baik dari segi fasilitas hingga ukuran kamarnya.

               Kadang juga bisa merujuk ke sebuah kamar khusus dengan letak yang strategis, misalnya memiliki pemandangan yang bagus.Kamar jenis ini biasanya juga dikenal sebagai premium room.

            </p>
              <button class="read_more" data-bs-toggle="modal" data-bs-target="#superior">Lihat Fasilitas</button>
           </div>
        </div>
        <div class="col-md-6">
           <div class="row">
              <div class="col-md-12">
                 <div class="img_box">
                    <figure><img src="plate/images/img1.jpg" alt="#"/></figure>
                 </div>
              </div>
              <div class="col-md-6">
                 <div class="img_box">
                    <figure><img src="plate/images/img2.jpg" alt="#"/></figure>
                 </div>
              </div>
              <div class="col-md-6">
                 <div class="img_box">
                    <figure><img src="plate/images/img3.jpg" alt="#"/></figure>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>

<div class="modal fade" id="superior" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="card-header">
          Fasilitas Kamar
         </div><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card">
      <div class="card-body">
        
           @foreach($superior as $s)

           <li>{{$s->nama}}</li>

          @endforeach
        </form>
</div></div></div></div></div></div></div>

<!-- end choose  section -->
<!-- our  section -->
<div class="our">
  <div class="container">
     <div class="row d_flex">
        <div class="col-md-6">
           <div class="img_box">
              <figure><img src="plate/images/deluxe.jpg" alt="#"/></figure>
           </div>
        </div>
        <div class="col-md-6">
           <div class="our_box">
              <div class="titlepage">
                 <h2><span class="text_norlam">Tipe </span> <br>Deluxe</h2>
              </div>
              <p>Deluxe room merupakan tipe kamar yang dirancang lebih berkelas dan lebih luas dari dua tipe sebelumnya.

               Kamar tipe ini umumnya juga ditempatkan di area yang strategis.Meski demikian, di beberapa hotel, tipe kamar ini kadang diletakkan di bawah tipe superior room.

            </p>
              <button class="read_more" data-bs-toggle="modal" data-bs-target="#deluxe" >Lihat Fasilitas</button>
           </div>
        </div>
     </div>
  </div>
</div>

<div class="modal fade" id="deluxe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="card-header">
          Fasilitas Kamar
         </div><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card">
      <div class="card-body">
        
           @foreach($deluxe as $d)

           <li>{{$d->nama}}</li>

          @endforeach
        </form>
</div></div></div></div></div></div></div>
<!-- end our  section -->


<!-- about -->
<div id="about"  class="about">
  <div class="container-fluid">
     <div class="row d_flex">
        <div class="col-md-6">
           <div class="about_text">
              <div class="titlepage">
                 <h2>Tentang Kami</h2>
                 <p>Hotel Hebat terletak di Kepulauan Riau, 1 km (10 menit) dari pusat kota Batam dan menghadap ke perbatasan singapore. </p>
              </div>
           </div>
        </div>
        <div class="col-md-6">
           <div class="about_img">
              <figure><img src="plate/images/hotel.jpg" alt="#"/></figure>
           </div>
        </div>
     </div>
  </div>
</div>
<!-- end about -->
<br><br id="fasilitas"><br><br>
<!-- Fasilitas Hotel -->
<center>
   <div class="titlepage">
      <h2><span class="text_norlam">Fasilitas </span> Hotel</h2>
      </div>
</center>
@foreach ($fhotel as $hotel)
<div class="our">
   <div class="container">
      <div class="row d_flex">
         <div class="col-md-6">
            <div class="img_box">
               <figure><img src="{{asset('fasilitas_hotel')}}/{{$hotel->file}}" style="width:500px"></figure>
            </div>
         </div>
         <div class="col-md-6">
            <div class="our_box">
               <div class="titlepage">
                  <h2><span class="text_norlam">{{$hotel->fhotel}} </span></h2>
               </div>
               <p> {{$hotel->keterangan}}</p>
         </div>
      </div>
   </div>
 </div>
 @endforeach

<!-- end Failitas hotel-->

<!--  footer -->
<footer id="contact">

     <div class="copyright">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <p>Copyright 2019 By Million</p>
              </div>
           </div>
        </div>
     </div>
  
</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>



@include('sweetalert::alert')
@endsection
