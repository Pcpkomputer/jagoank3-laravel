<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Jagoan K3 - Web Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <link rel="stylesheet" href="{{url('/bootstrap-table.min.css')}}">
   

    <!-- Bootstrap core CSS -->
<link href="{{url('/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{url('/dashboard.css')}}" rel="stylesheet">
  </head>
  <body>
    
  <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color:rgb(35, 182, 151)">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" style="background-color:rgb(35, 182, 151)" href="#">Jagoan K3</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="{{url('/admin/logout')}}">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid" style="margin-bottom:35px">
  <div class="row">
   
    
    @include("Components.sidebar", array("selected"=>"instruktur"))

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Instruktur</h1>
      </div>
      <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
          @endif
        @endforeach
      </div>
      <div>
          <a href="/admin/instruktur/create"><button class="btn btn-success mb-3">Tambah</button></a>
      </div>
      <table id="table" data-toggle="table">
  <thead>
    <tr>
      <th>ID Instruktur</th>
      <th>Foto</th>
      <th>Nama</th>
      <th>Tentang</th>
      <th>Posisi</th>
      <th>Video YT</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($instruktur as $instruktur)
    <tr>
        <td>{{$instruktur->id_instruktur}}</td>
        <td>
          <img src="/storage/public/instruktur/{{$instruktur->foto}}" style="width:150px;height:150px"></img>
        </td>
        <td>{{$instruktur->nama}}</td>
        <td>{{$instruktur->tentang}}</td>
        <td>{{$instruktur->posisi}}</td>
        <td>{{$instruktur->videoyt}}</td>
        <td>
              <a href="/admin/instruktur/update/{{$instruktur->id_instruktur}}"><button class="btn btn-primary mb-3">Update</button></a>
              <a href="/admin/instruktur/delete/{{$instruktur->id_instruktur}}"><button class="btn btn-danger mb-3">Delete</button></a>
        </td>
      </tr>
  @endforeach
  </tbody>
</table>
          
           
      </div>
    </main>
  </div>
</div>

     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../dashboard.js"></script>
      <script src="{{url('/bootstrap-table.min.js')}}"></script>
      <script>
         $('#table').bootstrapTable({
             pagination:true
            })
      </script>
    </body>
</html>
