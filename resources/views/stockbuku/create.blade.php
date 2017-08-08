 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="{{ asset('css/iconmaterialize.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="blue lighten-4">
    <ul id="slide-out" class="side-nav fixed">
    <li><div class="userView">
      <div class="background">
        <img src="{{ asset('img/user-bg.jpg') }}">
      </div>
      <a href="#!user"><img class="circle" src="{{ asset('img/avatar.png') }}"></a>
      <a href="#!name"><span class="white-text name"> {{ Auth::user()->name }}</span></a>
      <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <span class="white-text email">Logout</span></a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
        </form>

    </div></li>
    <li><a href="/buku" class="waves-effect"><i class="material-icons">cloud</i>List Buku</a></li>

    <li><a href="/penerbit" class="waves-effect"><i class="material-icons">cloud</i>List Penerbit</a></li>
    <li><div class="divider"></div></li>
    <li class="active"><a class="waves-effect" href="/stockbuku"><i class="material-icons">cloud</i>Stock Buku</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>

    
        <div class="formbuku">
        <div class="card-panel light-blue lighten-4">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
       <h4>Input Stock Buku</h4><br>
			<div class="row">
    <form class="col s12" action="/stockbuku" method="post">
      <div class="row">
        <div class="input-field col s12">
          <label for="tgl_masuk" class="active">Tanggal Masuk Gudang</label>
          <input type="date" class="datepicker" name="tgl_masuk" id="tgl_masuk">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
    		<select name="buku_id">
    		@foreach ($bukus as $buku)
      			<option value="{{$buku->id}}">{{$buku->nama}}</option>
      		@endforeach
    		</select>
    		<label>Judul Buku</label>
  		</div>
      </div>
      <div class="row">
        <div class="input-field col s12">
    		<select name="penerbit_id">
			@foreach ($penerbits as $penerbit)
			<option value="{{$penerbit->id}}">{{$penerbit->nama}}</option>
			@endforeach
			</select>
    		<label>Nama Penerbit</label>
  		</div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="jumlah">
          <label for="last_name">Jumlah Buku</label>
        </div>
      </div>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="submit" value="Submit" class="btn">
      <a href="/" class="btn">Kembali</a>
    </form>
  </div>
		</div>
		</div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/materialize.min.js')}}"></script>
            <script>
      	$(document).ready(function() {
    $('select').material_select();
     $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  });
         
      </script>
    </body>
  </html>
