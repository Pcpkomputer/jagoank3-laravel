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
  
  @include("Components.sidebar", array("selected"=>"training"))

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-bottom:20px">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Training</h1>
      </div>
        
      <form method="POST" action="">
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="container row m-0" style="padding:0px;padding-bottom:30px">
            <div class="col-lg-6">
            <div class="form-group mb-2">
              <label class="mb-2" for="exampleInputEmail1">Nama Training</label>
              <input required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Training">
            </div>

            <div class="form-group mb-2">
              <label class="mb-2" for="exampleInputEmail1">Stok</label>
              <input required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Stok">
            </div>


            <div class="form-group mb-2">
              <label class="mb-2" for="exampleInputEmail1">Kategori Training</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>


            <div class="form-group mb-2">
              <label class="mb-2" for="exampleInputEmail1">Sub Kategori Training</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>


              <div class="form-group mb-2">
                <label class="mb-2" for="exampleInputEmail1">Deskripsi Singkat</label>
                <textarea required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Deskripsi Singkat"></textarea>
              </div>
              <div class="form-group mb-2">
                <label class="mb-2" for="exampleInputEmail1">Batch</label>
                <input required type="number" class="form-control" aria-describedby="emailHelp" placeholder="1">
              </div>

              <div class="form-group mb-2">
                <label class="mb-2" for="exampleInputEmail1">Jadwal Training</label>
                <input required type="date" class="form-control" aria-describedby="emailHelp" placeholder="1">
              </div>


              <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Galeri</label>
                    <div style="display:flex;flex-direction:row">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <button type="button">Tambah</button>
                    </div>
                  </div>

                  <ul class="list-group" style="max-height:150px;margin-top:20px;height:150px;background-color:whitesmoke">
                    <li class="list-group-item" style="display:flex;flex-direction:row;justify-content:space-between">
                        <div>Galeri 1</div>
                        <div style="cursor:pointer">
                          <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                       </div>
                    </li>
                  </ul>




            </div>
            <div class="col-lg-6">
                    

                <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Deskripsi Penuh</label>
                    <textarea required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Deskripsi Singkat"></textarea>
                  </div>


                <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Persyaratan</label>
                    <textarea required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Persyaratan"></textarea>
                  </div>


                  <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Fasilitas</label>
                    <textarea required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Fasilitas"></textarea>
                  </div>
                  


                  <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Info Pendaftaran</label>
                    <textarea required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Info Pendaftaran"></textarea>
                  </div>


                  <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Instruktur</label>
                    <textarea required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Instruktur"></textarea>
                  </div>


                  <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Ulasan</label>
                    <textarea required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Ulasan"></textarea>
                  </div>


                  <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Testimoni</label>
                    <div style="display:flex;flex-direction:row">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <button type="button">Tambah</button>
                    </div>
                  </div>

                  <ul class="list-group" style="max-height:150px;margin-top:20px;height:150px;background-color:whitesmoke">
                    <li class="list-group-item" style="display:flex;flex-direction:row;justify-content:space-between">
                        <div>Galeri 1</div>
                        <div style="cursor:pointer">
                          <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                       </div>
                    </li>
                  </ul>


            </div>
        </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Promo & Paket</h1>
      </div>
        

        <button type="submit" style="margin-top:15px;" class="btn btn-primary">Submit</button>
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
        
      </script>
    </body>
</html>
