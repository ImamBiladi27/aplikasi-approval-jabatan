<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>

<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('home') }}">
                    Home
                </a>
                <a class="navbar-brand" href="{{ route('tambah-data') }}">
                    Tambah Data
                </a>

                @if(auth()->user()->role==1||auth()->user()->role==2)
                <a class="navbar-brand" href="{{ route('approval') }}">
                    Approval
                </a>
                @endif
                <a class="navbar-brand" href="{{ route('biodata') }}">
                    Tambah Biodata
                </a>
                <a class="navbar-brand" href="{{ route('biodata') }}">
                    Biodata
                </a>
            </div>

        </div>
    </nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Biodata Diri</div>
                <div class="panel-body">

                    <form role="form" method="post" action="{{ route('tambahBiodata') }}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                        </div>
                        <label class="control-label">Alamat Tempat Tinggal</label>
                        <br>
                        <br>
                        <div class="form-group">
                        <label class="control-label">Kabupaten</label>
                        <select class="form-control" name="kabupaten" id="kabupaten">
                            <option>Pilih Kabupaten..</option>
                            @foreach($regencies as $kabupaten)
                                <option value="{{$kabupaten->id}} ">{{$kabupaten->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label class="control-label">Kecamatan</label>
                        <select class="form-control" name="kecamatan" id="kecamatan">
                            <option>Pilih Kecamatan..</option>

                        </select>
                        </div>
                        <div class="form-group">
                        <label class="control-label">Kelurahan</label>
                        <select class="form-control" name="kelurahan" id="kelurahan">
                            <option>Pilih kelurahan..</option>

                        </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">User Id</label>
                            <input type="text" name="user_id" class="form-control" value="{{ Auth::user()->id }}" >
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>




    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
    $(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    $(function(){
        $('#kabupaten').on('change',function(){
            let id_kabupaten = $('#kabupaten').val();

            // console.log(id_kabupaten);
            $.ajax({
                type: 'POST',
                url : "{{route('getkecamatan')}}",
                data: {id_kabupaten:id_kabupaten},
                cache: false,
                success: function(msg){
                    $('#kecamatan').html(msg);
                },
                error: function(data){
                    console.log('error:',data);
                }
            })
        })
    });
    $(function(){
        $('#kecamatan').on('change',function(){
            let id_kecamatan = $('#kecamatan').val();

            // console.log(id_kabupaten);
            $.ajax({
                type: 'POST',
                url : "{{route('getkelurahan')}}",
                data: {id_kecamatan:id_kecamatan},
                cache: false,
                success: function(msg){
                    $('#kelurahan').html(msg);
                },
                error: function(data){
                    console.log('error:',data);
                }
            })
        })
    });
    });
</script>
</body>

</html>
