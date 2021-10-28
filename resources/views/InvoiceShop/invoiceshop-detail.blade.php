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
  
  @include("Components.sidebar", array("selected"=>"invoiceshop"))

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Invoice Training</h1>
      </div>
        
      <form id="formSudahDibayar" method="POST" action="">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group mb-2">
          <label class="mb-2" for="exampleInputEmail1">ID Invoice Training</label>
          <input readonly required value="" name="id" type="text" class="form-control" aria-describedby="emailHelp" placeholder="ID User">
        </div>
        <div class="form-group mb-2">
          <label class="mb-2" for="exampleInputEmail1">Kode Invoice</label>
          <input readonly required value="" name="id" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Kode Invoice">
        </div>
        
        <form method="POST" action="" class="form-group mb-2">
          <input type="hidden" name="_method" value="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <label class="mb-2" for="exampleInputEmail1">Sudah Dibayar?</label>
              <select name="sudahdibayar" value="{{$invoiceshop[0]->status}}" name="statuspembayaran" required class="form-control" id="selecttipetraining">
                 @if($invoiceshop[0]->status=="Belum Dibayar")
                  <option value="Sudah Dibayar">Sudah Dibayar</option>
                  <option selected value="Belum Dibayar">Belum Dibayar</option>
                @else
                 <option selected value="Sudah Dibayar">Sudah Dibayar</option>
                  <option value="Belum Dibayar">Belum Dibayar</option>
                 @endif
              </select>
        </form>
        <div class="form-group mb-2">
        <table data-show-columns="true" 
              data-sort="true"
              id="table" data-toggle="table">
          <thead>
            <tr>
              <th>Nama Paket Pelatihan</th>
              <th>Harga Paket Pelatihan</th>
            </tr>
          </thead>
          <tbody>
              @foreach($iteminvoiceshop as $iteminvoiceshop)
                <tr>
                   <td>{{$iteminvoiceshop->nama_barang}}</td>
                      <td>{{$iteminvoiceshop->harga}}</td>
                </tr>
              @endforeach
          </tbody>
        </table>
          <div style="margin-top:20px">
            Total Dibayar : {{$jumlahdibayar}}
          </div>
          <div style="margin-top:20px;">
              <div id="btnSimpan" class="btn btn-primary">Simpan</div>
          </div>
        </div>
      </form>
           
      </div>
    </main>
  </div>
</div>

     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="{{url('/dashboard.js')}}"></script>
      <script src="{{url('/bootstrap-table.min.js')}}"></script>
      <script>
        $(document).on("click","#btnSimpan",()=>{
           document.querySelector("#formSudahDibayar").submit();
        })
      </script>
    </body>
</html>
