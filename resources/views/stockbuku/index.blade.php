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
    <li class="active"><a class="waves-effect" href="/stockbuku" class="waves-effect"><i class="material-icons">cloud</i>Stock Buku</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                <div>
                        
        <div class="search" style="margin-left:500px;">
        <form action="/stockbuku/search" method="post">
        <div class="input-field col s2">
          <input placeholder="Masukan Tanggal Masuk!" id="first_name" type="text" class="validate" name="keyword">
          <label for="first_name">Masukan Tanggal Masuk!</label>
          <input type="submit" value="Cari!" class="btn">
        </div>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
        <hr>
        <a href="/stockbuku/create" class="btn">Input Stock Barang</a>
        
        </div>
        <h3 class="center">List Data Stock Barang</h2>
        
      <table class="striped table centered teal lighten-2">
        <thead>
          <tr>
              <th data-field="id">Tanggal Masuk Gudang</th>
              <th data-field="name">Judul Buku</th>
              <th data-field="price">Nama Penerbit</th>
              <th data-field="price">Jumlah</th>
              <th data-field="price" colspan="3">Opsi</th>
          </tr>
        </thead>

        <tbody>
        @foreach ($stockbuku as $data)
          <tr>
            <td>{{ $data->tgl_masuk }}</td>
            <td>{{ $data->buku->nama }}</td>
            <td>{{ $data->penerbit->nama }}</td>
            <td>{{ $data->jumlah }}</td>
            <td><a href="/stockbuku/{{$data->id}}/edit"><i class="material-icons">mode_edit</i></a></td>
            <td>
              <a href="/stockbuku/{{$data->id}}"
        onclick="event.preventDefault();
        document.getElementById('delete-form').submit();">
        
      <i class="material-icons">delete</i>
            </a>
                <form action="/stockbuku/{{$data->id}}" method="post" id="delete-form" style="display: none;">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="delete">
                        <input type="submit" value="Delete" class="btn">
                </form>
            </td>
            <td><a href="/stockbuku/{{$data->id}}"><i class="material-icons">trending_flat</i></a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
        <div class="pagging" style="margin-left:500px;">
                {{ $stockbuku->links() }}
        </div>





      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
    </body>
  </html>

