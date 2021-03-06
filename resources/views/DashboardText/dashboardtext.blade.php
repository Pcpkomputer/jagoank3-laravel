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

<div class="container-fluid">
  <div class="row">
   
    
    @include("Components.sidebar", array("selected"=>"dashboardtext"))

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-bottom:70px">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard Text</h1>
      </div>
      <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
          @endif
        @endforeach
      </div>
      <div>
          <button id="btnSimpan" type="button" class="btn btn-success mb-3">Simpan</button>
      </div>
      <div style="margin-top:10px">
          <h3>Tentang Kami</h3>
          <textarea name="tentangkami" placeholder="Tentang Perusahaan" class="form-control" style="width:100%;margin-top:20px;height:200px">{{$dashboardtext->tentangkami}}</textarea>
      </div>
      <div style="margin-top:30px">
          <h3>Section 2</h3>
          @foreach($dashboardtext->section2 as $index => $section2)
          <div id="section2" class="row" style="margin-top:20px">
              <div class="col-lg-8">
                <label>Text {{$index+1}}</label>
                <input name="judulsection2" value="{{$section2->judul}}" placeholder="Judul" style="margin-top:10px" type="text" class="form-control">
                <input name="subjudulsection2" value="{{$section2->subjudul}}" placeholder="Sub Judul" style="margin-top:10px" type="text" class="form-control">
                <textarea name="isisection2" placeholder="Isi Section" class="form-control" style="width:100%;margin-top:20px;height:200px">{{$section2->isi}}</textarea>
              </div>
              @if($index<2)
                <div class="col-lg-4" style="display:flex;flex-direction:column">
                  <label>Gambar {{$index+1}}</label>
                  <input accept="image/*" style="margin-top:15px;margin-bottom:15px" type="file" id="{{'section2gambarfake-'.$index}}"/>
                  <img id="section2gambarfakeimage-{{$index}}" src="/storage/public/section2/section2gambar-{{$index}}.jpg" style="background-color:whitesmoke;height:300px">
                </div>
              @endif
          </div>
          @endforeach
      </div>
      <div style="margin-top:30px">
          <h3>Kebijakan</h3>
          @foreach($dashboardtext->kebijakan as $index => $kebijakan)
              <input name="kebijakan" value="{{$kebijakan}}" class="form-control" style="margin-top:20px" type="text" placeholder="Kebijakan {{$index+1}}"/>
          @endforeach
      </div>
    </div>
    </main>
  </div>
  <form id="formdashboardtext" style="display:none" enctype="multipart/form-data" method="POST" action="dashboardtext/create">
      <input type="hidden" name="_method" value="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input name="jsonpayload" id="jsonpayload" type="text"/>

      <input name="section2gambar-0" type="file" id="section2gambarreal-0"/>
      <input name="section2gambar-1" type="file" id="section2gambarreal-1"/>
      <input name="section2gambar-2" type="file" id="section2gambarreal-2"/>
  </form>
</div>

     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../dashboard.js"></script>
      <script src="{{url('/bootstrap-table.min.js')}}"></script>
      <script>
          $(document).on("click","#btnSimpan",(e)=>{
            e.preventDefault();
            let tentangkami = document.querySelector("textarea[name=tentangkami]").value;
            let section2 = [];
            document.querySelectorAll("#section2").forEach((el)=>{
                let judul = el.querySelector("input[name=judulsection2]").value;
                let subjudul = el.querySelector("input[name=subjudulsection2]").value;
                let isi = el.querySelector("textarea[name=isisection2]").value;
                section2.push({
                  judul,
                  subjudul,
                  isi
                })
            });
            let kebijakan = [];
            document.querySelectorAll("input[name=kebijakan]").forEach((el)=>{
              kebijakan.push(el.value);
            });

            let payload = JSON.stringify({
              tentangkami,
              section2,
              kebijakan
            });

            document.querySelector("input[id=jsonpayload]").value=payload;
            document.querySelector("#formdashboardtext").submit();
          })
         
      </script>
      <script>
         $(document).on("change","#section2gambarfake-0", (e)=>{
          let url = URL.createObjectURL(e.target.files[0]);
          document.querySelector("#section2gambarfakeimage-0").src=url;
          document.querySelector("#section2gambarreal-0").files=e.target.files;
         });

         $(document).on("change","#section2gambarfake-1", (e)=>{
          let url = URL.createObjectURL(e.target.files[0]);
          document.querySelector("#section2gambarfakeimage-1").src=url;
          document.querySelector("#section2gambarreal-1").files=e.target.files;
         });

         $(document).on("change","#section2gambarfake-2", (e)=>{
          let url = URL.createObjectURL(e.target.files[0]);
          document.querySelector("#section2gambarfakeimage-2").src=url;
          document.querySelector("#section2gambarreal-2").files=e.target.files;
         });
      </script>
    </body>
</html>
