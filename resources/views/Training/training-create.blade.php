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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
  
  @include("Components.sidebar", array("selected"=>"training"))

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-bottom:20px">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Training</h1>
      </div>
        
      <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input id="inputJsonGaleri" type="hidden" name="galeri">
        <input id="inputJsonTestimoni" type="hidden" name="testimoni">
        <input id="inputJsonPelatihan" type="hidden" name="pelatihan">
        <input id="inputJsonModulYoutube" type="hidden" name="modulyoutube">

        <div class="container row m-0" style="padding:0px;padding-bottom:30px">
            <div class="col-lg-6">
            <div class="form-group mb-2">
              <label class="mb-2" for="exampleInputEmail1">Nama Training</label>
              <input required name="namatraining" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Training">
            </div>

            <div class="form-group mb-2">
              <label class="mb-2" for="exampleInputEmail1">Tipe Training</label>
              <select name="tipetraining" required class="form-control" id="selecttipetraining">
                  <option value="Online">Online</option>
                  <option value="Offline">Offline</option>
              </select>
            </div>


            <div class="form-group mb-2">
              <label class="mb-2" for="exampleInputEmail1">Nominal Penerima Hasil Dari Referral</label>
              <input name="nominalpenerimareferral" required type="number" class="form-control" aria-describedby="emailHelp" placeholder="Nominal Penerima Hasil Dari Referral">
            </div>

            <div class="form-group mb-2">
              <label class="mb-2" for="exampleInputEmail1">Nominal Pemotongan Dari Referral</label>
              <input name="nominalpemotonganreferral" required type="number" class="form-control" aria-describedby="emailHelp" placeholder="Nominal Pemotongan Dari Referral">
            </div>

            <div class="form-group mb-2">
              <label class="mb-2" for="exampleInputEmail1">Kategori Training</label>
              <select name="kategoritraining" required id="selectKategoriTraining" class="form-control" id="exampleFormControlSelect1">
                @foreach($kategoritraining as $kategoritraining)
                    <option value="{{$kategoritraining->id_kategoritraining}}">{{$kategoritraining->nama_kategoritraining}}</option>
                @endforeach
                </select>
            </div>


            <div class="form-group mb-2">
              <label class="mb-2" for="exampleInputEmail1">Sub Kategori Training</label>
              <select name="subkategoritraining" required id="selectSubKategoriTraining" class="form-control" id="exampleFormControlSelect1">
                @foreach($subkategori as $subkategori)
                    <option value="{{$subkategori->nama_subkategoritraining}}">{{$subkategori->nama_subkategoritraining}}</option>
                @endforeach
              </select>
            </div>


              <div class="form-group mb-2">
                <label class="mb-2" for="exampleInputEmail1">Deskripsi Singkat</label>
                <textarea name="deskripsisingkat" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Deskripsi Singkat"></textarea>
              </div>
              <div class="form-group mb-2">
                <label class="mb-2" for="exampleInputEmail1">Batch</label>
                <input name="batch" required type="number" class="form-control" aria-describedby="emailHelp" placeholder="Isikan Batch">
              </div>


              <div class="form-group mb-2">
                <label class="mb-2" for="exampleInputEmail1">Gambar</label>
                <input name="foto" required type="file" class="form-control" aria-describedby="emailHelp">
              </div>

              <div class="form-group mb-2">
                <label class="mb-2" for="exampleInputEmail1">Jadwal Training</label>
                <input name="jadwaltraining" required type="date" class="form-control" aria-describedby="emailHelp" placeholder="1">
              </div>


              <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Galeri</label>
                    <div style="display:flex;flex-direction:row">
                        <select id="galeriselect" class="form-control">
                           @foreach($galeri as $galeri)
                              <option data-id="{{$galeri->id_galeri}}" value="{{$galeri->gambar}}">{{$galeri->judul}}</option>
                           @endforeach
                        </select>
                        <button id="btnTambahGaleriSelect" class="btn-primary" style="border:none" type="button">Tambah</button>
                    </div>
                  </div>

                  <ul class="list-group" id="containerListGaleri" style="max-height:150px;overflow:auto;margin-top:20px;height:150px;background-color:whitesmoke">
                    <!-- <li class="list-group-item" style="display:flex;flex-direction:row;justify-content:space-between">
                        <div style="display:flex;flex-direction:row">
                            <img src="testing.jpg" style="width:50px;height:50px"></img>
                            <div style="margin-left:10px;display:flex;justify-content:center;align-items:center">asdasd</div>
                        </div>
                  
                        <div style="cursor:pointer">
                          <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                       </div>
                    </li> -->
                  </ul>




            </div>
            <div class="col-lg-6">
                    

                <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Deskripsi Penuh</label>
                    <textarea name="deskripsipenuh" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Deskripsi Singkat"></textarea>
                  </div>


                <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Persyaratan</label>
                    <textarea name="persyaratan" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Persyaratan"></textarea>
                  </div>


                  <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Fasilitas</label>
                    <textarea name="fasilitas" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Fasilitas"></textarea>
                  </div>
                  


                  <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Info Pendaftaran</label>
                    <textarea name="infopendaftaran" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Info Pendaftaran"></textarea>
                  </div>


                  <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Instruktur</label>
                    <textarea name="instruktur" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Instruktur"></textarea>
                  </div>


                  <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Ulasan</label>
                    <textarea name="ulasan" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Ulasan"></textarea>
                  </div>


                  <div class="form-group mb-2">
                    <label class="mb-2" for="exampleInputEmail1">Testimoni</label>
                    <div style="display:flex;flex-direction:row">
                        <select id="testimoniselect" class="form-control" id="exampleFormControlSelect1">
                          @foreach($testimoni as $testimoni)
                            <option data-id="{{$testimoni->id_pelatihantestimoni}}" data-nama="{{$testimoni->nama}}" value="{{$testimoni->id_pelatihantestimoni}}">{{$testimoni->testimoni}}</option>
                          @endforeach
                        </select>
                        <button id="btnTambahTestimoniSelect" class="btn-primary" style="border:none" type="button">Tambah</button>
                    </div>
                  </div>

                  <ul class="list-group" id="containerListTestimoni" style="max-height:150px;overflow:auto;margin-top:20px;height:150px;background-color:whitesmoke">
                    <!-- <li class="list-group-item" style="display:flex;flex-direction:row;justify-content:space-between">
                        <div style="display:flex;flex-direction:row">
                            <div>
                              asddadasdsaas
                            </div>
                            <div style="margin-left:10px;word-break:break-all;margin-right:10px">
                              asddadasdsaasasddadasdsaasasddadasdsaasasddadasdsaasasddadasdsaasasddadasdsaasasddadasdsaas
                            </div>
                        </div>
                        <div style="cursor:pointer">
                          <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                       </div>
                    </li> -->
                  </ul>


                  

                  <div id="inputFormContainerModulYoutube" class="form-group mb-2" style="margin-top:10px">
                    <label class="mb-2" for="exampleInputEmail1">Modul Youtube</label>
                    <div style="display:flex;flex-direction:row">
                        <input placeholder="contoh: 9xbBGKJtQD8" id="inputModulYoutube" class="form-control" type="text">
                        <button id="btnTambahModulYoutubeSelect" class="btn-primary" style="border:none" type="button">Tambah</button>
                    </div>
                  </div>


                  <ul class="list-group" id="containerListModulYoutube" style="max-height:150px;overflow:auto;margin-top:20px;height:150px;background-color:whitesmoke">
                    <!-- <li class="list-group-item" style="display:flex;flex-direction:row;justify-content:space-between">
                        <div style="display:flex;flex-direction:row">
                            <div>
                              <iframe width="100" height="100" src="https://www.youtube.com/embed/9xbBGKJtQD8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div style="margin-left:10px;word-break:break-all;margin-right:10px;display:flex;justify-content:center;align-items:center">
                              aD26xZ
                            </div>
                        </div>
                        <div style="cursor:pointer;display:flex;justify-content:center;align-items:center">
                          <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                       </div>
                    </li> -->
                  </ul>



            </div>
        </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Promo & Paket</h1>
      </div>
        <div class="container" style="padding:0px;margin:0px;">
            <div class="row" style="justify-content:center;align-items:center">
            <div class="col-lg-2">
                  <label class="mb-2" for="exampleInputEmail1">Nama Paket Pelatihan</label>
                  <input name="paketpelatihan_nama" type="text" class="form-control" style="width:100%"/>
                </div>
                <div class="col-lg-2">
                 <label class="mb-2" for="exampleInputEmail1">Harga Paket</label>
                  <input name="paketpelatihan_harga" type="number" class="form-control" style="width:100%"/>
                </div>
                <div class="col-lg-2">
                <label class="mb-2" for="exampleInputEmail1">Harga Paket (Jika Promo)</label>
                  <input name="paketpelatihan_hargapromo" type="number" class="form-control" style="width:100%"/>
                </div>
              
                <div class="col-lg-1" style="display:flex;align-items:center;justify-content:center;flex-direction:column">
                  <label style="margin-right:15px">Sedang Promo?</label>
                  <input name="sedangpromo" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </div>

                <div class="col-lg-2">
                <label class="mb-2" for="exampleInputEmail1">Promo Berakhir?</label>
                  <input name="paketpelatihan_tanggalpromoberakhir" type="date" class="form-control" style="width:100%"/>
                  <input name="paketpelatihan_waktupromoberakhir" type="time" class="form-control" style="width:100%"/>
                </div>


                <div class="col-lg-1" style="margin-bottom:20px">
                <label class="mb-2" for="exampleInputEmail1">Stok Kursi</label>
                  <input name="paketpelatihan_stokkursi" type="number" class="form-control" style="width:100%"/>
                </div>
                

                <div class="col-lg-2" style="display:flex;align-items:center">
                   <button id="btnTambahPelatihan" type="button" class="btn btn-primary">Tambah</button>
                </div>
           </div>
           <div id="containerRenderPromoDanPaket" style="margin-top:40px">
               <!-- <div style="background-color:whitesmoke;display:flex;flex-direction:row;padding:20px;border-radius:5px;font-weight:bold;margin-bottom:20px">
                  <div style="flex:1">
                        <div style="display:flex;flex-direction:row;margin-bottom:5px">
                            <div style="font-size:15px">Nama Paket Pelatihan : </div>
                            <div style="margin-left:5px">Ini adalah pelatihan A</div>
                        </div>
                        <div style="display:flex;flex-direction:row;margin-bottom:5px">
                            <div style="font-size:15px">Harga Pelatihan : Rp.</div>
                            <div style="margin-left:5px">5000</div>
                        </div>
                        <div style="display:flex;flex-direction:row;margin-bottom:5px">
                            <div style="font-size:15px">Harga Pelatihan (Jika Promo) : Rp.</div>
                            <div style="margin-left:5px">500</div>
                        </div>
                        <div style="display:flex;flex-direction:row;margin-bottom:5px">
                            <div style="font-size:15px">Tanggal Berakhir Promo : </div>
                            <div style="margin-left:5px">2019-12-13 08:00</div>
                        </div>
                  </div>
                  <div style="display:flex;justify-content:center;align-items:center">
                        <div class="btn btn-danger">asdsad</div>
                  </div>
              </div> -->
          </div>
        </div>
        <button type="button" id="btnFakeSubmit" style="margin-top:50px;margin-bottom:50px;" class="btn btn-primary">Submit</button>
        <button type="submit" id="btnRealSubmit" style="display:none;margin-top:50px;margin-bottom:50px;" class="btn btn-primary">Submit</button>
      </form>
           
      </div>
    </main>
  </div>
</div>

     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="{{url('/dashboard.js')}}"></script>
      <script src="{{url('/bootstrap-table.min.js')}}"></script>
      <script>

        $(document).on("change","#selectKategoriTraining",async ()=>{
           let id = document.querySelector("#selectKategoriTraining").value;

           let request = await fetch(`/api/get/subkategori/${id}`);
           let json = await request.json();
           
           let request2 = await fetch(`/api/get/testimoni/${id}`);
           let json2 = await request2.json();

           let subkategori = ``;
           let testimoni = ``;

           json.forEach((item,index)=>{
             subkategori = subkategori+`
                <option value="${item.nama_subkategoritraining}">${item.nama_subkategoritraining}</option>
             `
           });

           json2.forEach((item,index)=>{
             testimoni = testimoni+`
                <option data-id="${item.id_pelatihantestimoni}" data-nama="${item.nama}" value="${item.id_pelatihantestimoni}">${item.testimoni}</option>
             `
           });

           document.querySelector("#selectSubKategoriTraining").innerHTML=subkategori;
           document.querySelector("#testimoniselect").innerHTML=testimoni;
          

        })

        $(document).ready(function() {
            $('#testimoniselect').select2();
        });


        $(document).ready(function() {
            $('#galeriselect').select2({
              templateResult:function(state){
                let image = state.id;
                let $state = $(
                  `<div style="display:flex;flex-direction:row">
                    <img src="{{url('/storage/public/galeri/${image}')}}" style="height:50px;width:50px"></img>
                    <div style="margin-left:10px;margin-right:10px;display:flex;justify-content:center;align-items:center">${state.text}</div>
                </div>`
                )
                return $state;
              }
            });
        });
      </script>
      <script>

          let promodanpaket = [];

          function makeid(length) {
              var result           = '';
              var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
              var charactersLength = characters.length;
              for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * 
          charactersLength));
            }
            return result;
          }

          function renderPromoDanPaket(payload){
            let container = document.querySelector("#containerRenderPromoDanPaket");
            let html = ``;
            promodanpaket.forEach((payload,index)=>{
               html = html+`
            <div data-id="${payload.id}" style="background-color:whitesmoke;display:flex;flex-direction:row;padding:20px;border-radius:5px;font-weight:bold;margin-bottom:20px">
                  <div style="flex:1">
                        <div style="display:flex;flex-direction:row;margin-bottom:5px">
                            <div style="font-size:15px">Nama Paket Pelatihan : </div>
                            <div style="margin-left:5px">${payload.namapaketpelatihan}</div>
                        </div>
                        <div style="display:flex;flex-direction:row;margin-bottom:5px">
                            <div style="font-size:15px">Harga Pelatihan : Rp.</div>
                            <div style="margin-left:5px">${payload.hargapaketpelatihan}</div>
                        </div>
                        <div style="display:flex;flex-direction:row;margin-bottom:5px">
                            <div style="font-size:15px">Stok Kursi :</div>
                            <div style="margin-left:5px">${payload.stokkursi}</div>
                        </div>
                        <div style="display:flex;flex-direction:row;margin-bottom:5px">
                            <div style="font-size:15px">Harga Pelatihan (Jika Promo) : Rp.</div>
                            <div style="margin-left:5px">${payload.hargapromopaketpelatihan}</div>
                        </div>
                        <div style="display:flex;flex-direction:row;margin-bottom:5px">
                            <div style="font-size:15px">Tanggal Berakhir Promo : </div>
                            <div style="margin-left:5px">${payload.paketpelatihan_tanggalpromoberakhir} ${payload.paketpelatihan_waktupromoberakhir}</div>
                        </div>
                  </div>
                  <div style="display:flex;justify-content:center;align-items:center">
                        <div id="btnHapusPaketDanPromo" class="btn btn-danger">Hapus</div>
                  </div>
              </div>
            `
            });
            container.innerHTML = html;
          }

          $(document).on("click","#btnHapusPaketDanPromo",(e)=>{
            let id = e.target.parentNode.parentNode.getAttribute("data-id");
            promodanpaket = promodanpaket.filter((el,index)=>{
                return el.id!==id;
            })
            renderPromoDanPaket();
          })

          $(document).on("click","#btnTambahPelatihan",(e)=>{
             let namapaketpelatihan = document.querySelector("input[name=paketpelatihan_nama]").value;
             let hargapaketpelatihan = document.querySelector("input[name=paketpelatihan_harga]").value;
             let hargapromopaketpelatihan = document.querySelector("input[name=paketpelatihan_hargapromo]").value;
             let sedangpromo = document.querySelector("input[name=sedangpromo]").checked;
             let stokkursi = document.querySelector("input[name=paketpelatihan_stokkursi]").value;

             let paketpelatihan_tanggalpromoberakhir = document.querySelector("input[name=paketpelatihan_tanggalpromoberakhir]").value;
             let paketpelatihan_waktupromoberakhir = document.querySelector("input[name=paketpelatihan_waktupromoberakhir]").value;

             if(sedangpromo){

                let notFilled = namapaketpelatihan.length===0 || hargapaketpelatihan.length===0  || stokkursi.length===0;

                if(notFilled || paketpelatihan_tanggalpromoberakhir.length===0 || paketpelatihan_waktupromoberakhir.length===0){
                  alert("Isikan nama, harga, tanggal promo, waktu promo berakhir dan stok kursi...");
                }
                else{
                  let payload = {
                    id:makeid(5),
                    namapaketpelatihan,
                    hargapaketpelatihan,
                    hargapromopaketpelatihan,
                    stokkursi,
                    sedangpromo,
                    paketpelatihan_tanggalpromoberakhir,
                    paketpelatihan_waktupromoberakhir
                  }

                  promodanpaket.push(payload);
                  renderPromoDanPaket(payload);
                }
             }  
             else{
                let notFilled = namapaketpelatihan.length===0 || hargapaketpelatihan.length===0 || stokkursi.length===0;
                
                if(notFilled){
                    alert("Isikan nama, harga pelatihan, dan stok kursi...");
                }
                else{
                  let payload = {
                    id:makeid(5),
                    namapaketpelatihan,
                    hargapaketpelatihan,
                    hargapromopaketpelatihan,
                    sedangpromo,
                    stokkursi,
                    paketpelatihan_tanggalpromoberakhir,
                    paketpelatihan_waktupromoberakhir
                  }

                  promodanpaket.push(payload);
                  renderPromoDanPaket(payload);
                } 
             }
          })

          $(document).on("click","#btnHapusIndividualGaleri",(e)=>{
              e.currentTarget.parentNode.outerHTML=``;
          })

          $(document).on("click","#btnTambahGaleriSelect",()=>{
            let val = document.querySelector("#galeriselect").value;

            let id = document.querySelector("#galeriselect").options[document.querySelector("#galeriselect").selectedIndex].getAttribute("data-id");
            
            document.querySelector("#containerListGaleri").innerHTML = 
            document.querySelector("#containerListGaleri").innerHTML + `
            <li class="list-group-item" id="listGaleri" style="display:flex;flex-direction:row;justify-content:space-between">
                        <div data-url="${val}" data-id="${id}" id="itemGaleri" style="display:flex;flex-direction:row">
                            <img src="/storage/public/galeri/${val}" style="width:50px;height:50px"></img>
                            <div style="margin-left:10px;display:flex;justify-content:center;align-items:center">${val}</div>
                        </div>
                  
                        <div id="btnHapusIndividualGaleri" style="cursor:pointer">
                          <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                       </div>
                    </li>
            `
          })

          $(document).on("click","#btnTambahTestimoniSelect",()=>{
            let val = document.querySelector("#testimoniselect").value;
            let text = document.querySelector("#testimoniselect");

            let selectedtext = text.options[text.selectedIndex].text;

            let nama = text.options[text.selectedIndex].getAttribute("data-nama");
            let id = text.options[text.selectedIndex].getAttribute("data-id");

            document.querySelector("#containerListTestimoni").innerHTML = 
            document.querySelector("#containerListTestimoni").innerHTML + `
            <li data-id="${id}" id="listTestimoni" class="list-group-item" style="display:flex;flex-direction:row;justify-content:space-between">
                        <div style="display:flex;flex-direction:row">
                            <div>
                              ${nama}
                            </div>
                            <div style="margin-left:10px;word-break:break-all;margin-right:10px">
                              ${selectedtext}
                            </div>
                        </div>
                        <div style="cursor:pointer">
                          <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                       </div>
                    </li>
            `
          });

          $(document).on("click","#btnFakeSubmit",()=>{
             if(promodanpaket.length===0){
               alert("Isikan promo dan paket terlebih dahulu...");
             }
             else{
                  let listgaleri = document.querySelectorAll("#containerListGaleri #listGaleri");
                  let galeri = [];
                  listgaleri.forEach((el,index)=>{
                    let q = el.querySelector("#itemGaleri");
                    let url = q.getAttribute("data-url");
                    let id = q.getAttribute("data-id");
                    galeri.push({
                      url,
                      id
                    });
                  });


                  let listtestimoni = document.querySelectorAll("#listTestimoni");
                  let testimoni = [];
                  listtestimoni.forEach((el,index)=>{
                    let id = el.getAttribute("data-id");
                    testimoni.push({
                      id_pelatihantestimoni:id
                    })
                  });


                  let listmodulyoutube = document.querySelectorAll("#listModulYoutube");
                  let modulyoutube = [];
                  listmodulyoutube.forEach((el,index)=>{
                    let url = el.getAttribute("data-youtube");
                    modulyoutube.push(url);
                  });

                  document.querySelector("#inputJsonGaleri").value=JSON.stringify(galeri);
                  document.querySelector("#inputJsonTestimoni").value=JSON.stringify(testimoni);
                  document.querySelector("#inputJsonPelatihan").value=JSON.stringify(promodanpaket);
                  document.querySelector("#inputJsonModulYoutube").value=JSON.stringify(modulyoutube);

                  document.querySelector("#btnRealSubmit").click();

              }


           

           });

          //  $(document).on("change", "#selecttipetraining",()=>{
          //   alert("123");
          //  })

          $(document).on("click","#btnTambahModulYoutubeSelect",()=>{
             let value = document.querySelector("#inputModulYoutube").value;
             if(value.length===0){
                alert("Isikan Modul Youtube");
             }
             else{
                let container = document.querySelector("#containerListModulYoutube");
                container.innerHTML = container.innerHTML+`
                <li id="listModulYoutube" data-youtube="${value}" class="list-group-item" style="display:flex;flex-direction:row;justify-content:space-between">
                        <div style="display:flex;flex-direction:row">
                            <div>
                              <iframe width="100" height="100" src="https://www.youtube.com/embed/${value}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div style="margin-left:10px;word-break:break-all;margin-right:10px;display:flex;justify-content:center;align-items:center">
                              ${value}
                            </div>
                        </div>
                        <div id="deleteListModul" style="cursor:pointer;display:flex;justify-content:center;align-items:center">
                          <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                       </div>
                    </li>
                `
             }
          });

          $(document).on("click","#deleteListModul",(e)=>{
              e.currentTarget.parentNode.outerHTML=``;
          })
           
      </script>
    </body>
</html>
