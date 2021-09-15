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
    <link href="../dashboard.css" rel="stylesheet">
  </head>
  <body>
    
  <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color:rgb(35, 182, 151)">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" style="background-color:rgb(35, 182, 151)" href="#">Jagoan K3</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
  
  @include("Components.sidebar", array("selected"=>"kategoritraining"))

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kategori Training</h1>
      </div>
        
      <form id="formTambahSubKategoriTraining" method="POST" action="">
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group mb-2">
          <label class="mb-2" for="exampleInputEmail1">Nama Kategori Training</label>
          <input required type="text" name="namakategoritraining" class="form-control" aria-describedby="emailHelp" placeholder="Nama Kategori Training">
        </div>
        <div class="form-group mb-2">
          <label class="mb-2" for="exampleInputEmail1">Sub Kategori Training</label>
          <div style="display:flex;flex-direction:row">
              <input id="inputNamaKategoriTraining" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Sub Kategori Training">
              <div id="btnTambahSubKategori" class="btn btn-primary">+</div>
            </div>
        </div>
        <div class="form-group mb-2" style="margin-top:25px">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama Sub Kategori</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="bodyTableSubKategori">
               
                </tbody>
              </table>
        </div>
        <button type="submit" id="realSubmit" style="margin-top:15px;display:none" class="btn btn-success">Tambah</button>
        <button type="button" id="fakeSubmit" style="margin-top:15px;" class="btn btn-success">Tambah</button>
      </form>
           
      </div>
    </main>
  </div>
</div>

     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../dashboard.js"></script>
      <script src="{{url('/bootstrap-table.min.js')}}"></script>
      <script>
          $(document).on("click","#btnTambahSubKategori",()=>{
             let subkategori = document.querySelector("#inputNamaKategoriTraining").value;
             if(subkategori.length>0){

               let input = document.createElement("input");
               input.type="hidden";
               input.value=subkategori;
               input.name="subkategori[]";
               input.id="subkategori_";

               document.querySelector("#formTambahSubKategoriTraining").appendChild(input);

               let count = document.querySelectorAll("#bodyTableSubKategori tr").length;

               document.querySelector("#bodyTableSubKategori").innerHTML=
               document.querySelector("#bodyTableSubKategori").innerHTML+
               `
               <tr>
                      <th style="text-align:center;vertical-align:middle">${subkategori}</th>
                      <td>
                        <button type="button" id="hapusRowSubKategori" data-id="${count+1}" class="btn btn-danger">Hapus</button>
                      </td>
                </tr>
               `

               document.querySelector("#inputNamaKategoriTraining").value="";
             }

             
             else{
              alert("Isikan Sub Kategori Training");
             }
          })


          $(document).on("click","#fakeSubmit",()=>{
              let row = document.querySelector("#bodyTableSubKategori").querySelectorAll("tr");
              if(row.length===0){
                alert("Isikan Sub Kategori!");
              }
              else{
                document.querySelector("#realSubmit").click();
              }
          })



          $(document).on("click","#hapusRowSubKategori",(e)=>{

             let id = e.currentTarget.getAttribute("data-id");

             let input = document.querySelectorAll("#subkategori_");

             input.forEach((el,index)=>{
               if(index+1===parseInt(id)){
                  el.outerHTML="";
               }
             })
             
             e.currentTarget.parentNode.parentNode.outerHTML="";
          
          })



      </script>
    </body>
</html>
