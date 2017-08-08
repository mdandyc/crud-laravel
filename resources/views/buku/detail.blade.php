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
    <li class="active"><a href="/buku" class="waves-effect"><i class="material-icons">cloud</i>List Buku</a></li>

    <li><a href="/penerbit" class="waves-effect"><i class="material-icons">cloud</i>List Penerbit</a></li>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="/stockbuku"><i class="material-icons">cloud</i>Stock Buku</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                <div>
                        
        <div class="search" style="margin-left:500px;">
        <form action="/buku/search" method="post">
        <div class="input-field col s2">
          <input placeholder="Masukan Data Buku" id="first_name" type="text" class="validate" name="keyword">
          <label for="first_name">Masukan Data Buku</label>
          <input type="submit" value="Cari!" class="btn">
        </div>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
        <hr>
        <a href="/buku/create" class="btn">Input Buku</a>
        
        </div>
        <h3 class="center">Detail Buku</h2>
        
      <table class="striped table centered teal lighten-2">
        <thead>
          <tr>
              <th data-field="id">Judul</th>
              <th data-field="name">Harga Jual</th>
              <th data-field="price">Harga Dasar</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>{{ $view->nama }} </td>
            <td>{{ $view->harga_jual }} </td>
            <td>{{ $view->harga_dasar }} </td>
          </tr>
        </tbody>
      </table>





      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
    </body>
  </html>
