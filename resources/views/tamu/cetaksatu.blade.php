
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hotel Hebat</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('img/hotel.jpg') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    
</head>
<body>
<br>
<div class="container">'
    @foreach ($reservasis as $r)
    <div class="container">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-5">
                <div class="display-4 mb-2">
                Hotel Hebat
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3">
                Nama Pemesan
            </div>
            <div class="col-3">
                : {{ $r->namapem }}
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3">
                Nama Tamu
            </div>
            <div class="col-3">
                : {{ $r->namatam }}
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3">
                Email
            </div>
            <div class="col-3">
                : {{ $r->email }}
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3">
                No Handphone
            </div>
            <div class="col-3">
                : {{ $r->no_hp }}
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-3">
                Tipe Kamar
            </div>
            <div class="col-3">
                : {{ $r->tipe }}
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3">
                Jumlah Kamar
            </div>
            <div class="col-3">
                : {{ $r->total }}
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3">
                Tanggal 
            </div>
            <div class="col-3">
                : checkin   {{ $r->chekin }}
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3">
             
            </div>
            <div class="col-3">
                : checkout {{ $r->chekout }}
            </div>
        </div>
        
    </div>



</div>


@endforeach

<script type="text/javascript">
    window.print();

</script>


</body>

</html>

