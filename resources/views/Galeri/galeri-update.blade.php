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
    <link href="../../dashboard.css" rel="stylesheet">
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
  
  @include("Components.sidebar", array("selected"=>"galeri"))

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Galeri</h1>
      </div>
        
      <form method="POST" action="">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group mb-2">
          <label class="mb-2" for="exampleInputEmail1">ID Artikel</label>
          <input readonly type="text" class="form-control" aria-describedby="emailHelp" placeholder="ID Artikel">
        </div>
        <div class="form-group mb-2">
          <label class="mb-2" for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Title">
        </div>
        <div class="form-group mb-2">
          <label class="mb-2" for="exampleInputPassword1">Writer</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>
        </div>
        <div class="form-group mb-2">
          <label class="mb-2" for="exampleInputPassword1">Content</label>
          <textarea type="text" class="form-control" placeholder="Content"></textarea>
        </div>
        <div class="form-group mb-2">
          <label class="mb-2" for="exampleInputPassword1">Image</label>
          <input type="file" class="form-control">
        </div>
        <button type="submit" style="margin-top:15px;" class="btn btn-primary">Update</button>
      </form>
           
      </div>
    </main>
  </div>
</div>

     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../../dashboard.js"></script>
      <script src="{{url('/bootstrap-table.min.js')}}"></script>
      <script>
        
      </script>
    </body>
</html>
