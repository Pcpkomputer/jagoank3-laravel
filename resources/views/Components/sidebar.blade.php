<nav id="sidebarMenu" style="overflow:auto;padding-bottom:25px" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{$selected=='dashboard' ? 'active':''}}" aria-current="page" href="{{ url('/admin/dashboard') }}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Training</span>
        </h6>
        <li class="nav-item">
            <a class="nav-link {{$selected=='training' ? 'active':''}}" href="{{ url('/admin/training') }}">
              <span data-feather="file-text"></span>
              Training
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{($selected=='kategoritraining' ? 'active':'')}}" href="{{ url('/admin/kategoritraining') }}">
              <span data-feather="file-text"></span>
              Kategori Training
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{($selected=='vouchertraining' ? 'active':'')}}" href="{{ url('/admin/vouchertraining') }}">
              <span data-feather="file-text"></span>
              Voucher Training
            </a>
          </li>


          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Sertifikat</span>
        </h6>
        <li class="nav-item">
            <a class="nav-link {{($selected=='sertifikat' ? 'active':'')}}" href="{{ url('/admin/sertifikat') }}">
              <span data-feather="file-text"></span>
              Sertifikat
            </a>
          </li>


          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Master</span>
        </h6>
        <li class="nav-item">
            <a class="nav-link {{$selected==='instruktur' ? 'active':''}}" href="{{ url('/admin/instruktur') }}">
              <span data-feather="file-text"></span>
              Instruktur
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link {{$selected==='shop' ? 'active':''}}" href="{{ url('/admin/shop') }}">
              <span data-feather="file-text"></span>
              Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{($selected=='galeri' ? 'active':'')}}" href="{{ url('/admin/galeri') }}">
              <span data-feather="file-text"></span>
              Galeri
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{($selected=='artikel') ? 'active':''}}" href="{{ url('/admin/artikel') }}">
              <span data-feather="file-text"></span>
              Artikel
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{($selected=='webinar') ? 'active':''}}" href="{{ url('/admin/webinar') }}">
              <span data-feather="file-text"></span>
              Webinar
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{($selected=='ebook') ? 'active':''}}" href="{{ url('/admin/ebook') }}">
              <span data-feather="file-text"></span>
              E-book
            </a>
          </li>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Account</span>
        </h6>
        <li class="nav-item">
            <a class="nav-link {{($selected=='user') ? 'active':''}}" href="{{ url('/admin/user') }}">
              <span data-feather="file-text"></span>
              User
            </a>
          </li>




          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Reports</span>
        </h6>
        <li class="nav-item">
            <a class="nav-link {{($selected=='invoicetraining') ? 'active':''}}" href="{{ url('/admin/invoicetraining') }}">
              <span data-feather="file-text"></span>
              Invoice Training
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{($selected=='invoiceshop') ? 'active':''}}" href="{{ url('/admin/invoiceshop') }}">
              <span data-feather="file-text"></span>
              Invoice Shop
            </a>
          </li>


          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Extra</span>
        </h6>
        <li class="nav-item">
        <a class="nav-link {{($selected=='tentangjagoank3' ? 'active':'')}}" href="{{ url('/admin/tentangjagoank3') }}">
              <span data-feather="file-text"></span>
              Tentang Jagoan K3
            </a>
            <a class="nav-link {{($selected=='banner' ? 'active':'')}}" href="{{ url('/admin/banner') }}">
              <span data-feather="file-text"></span>
              Banner
            </a>
            <a class="nav-link {{($selected=='dashboardtext' ? 'active':'')}}" href="{{ url('/admin/dashboardtext') }}">
              <span data-feather="file-text"></span>
              Dashboard Text
            </a>
            <a class="nav-link {{($selected=='ourclient' ? 'active':'')}}" href="{{ url('/admin/ourclient') }}">
              <span data-feather="file-text"></span>
              Our Client
            </a>
            <a class="nav-link {{($selected=='linkmobile' ? 'active':'')}}" href="{{ url('/admin/linkmobile') }}">
              <span data-feather="file-text"></span>
              Link Playstore & Appstore
            </a>
            <a class="nav-link {{($selected=='gambarsection2dashboard' ? 'active':'')}}" href="{{ url('/admin/gambarsection2dashboard') }}">
              <span data-feather="file-text"></span>
              Gambar Section 2 Dashboard
            </a>
          </li>

        


          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Footer</span>
        </h6>

        <li class="nav-item">
            <a class="nav-link {{($selected=='hubungikami' ? 'active':'')}}" href="{{ url('/admin/hubungikami') }}">
              <span data-feather="file-text"></span>
              Hubungi Kami
            </a>
            <a class="nav-link {{($selected=='alamatkami' ? 'active':'')}}" href="{{ url('/admin/alamatkami') }}">
              <span data-feather="file-text"></span>
              Alamat Kami
            </a>
          </li>



          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Bantuan</span>
        </h6>

        <li class="nav-item">
            <a class="nav-link {{($selected=='halamanbantuan' ? 'active':'')}}" href="{{ url('/admin/halamanbantuan') }}">
              <span data-feather="file-text"></span>
              Halaman Bantuan
            </a>
    
        <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li> -->
        </ul>
<!-- 
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li> -->
        </ul>
      </div>
    </nav>