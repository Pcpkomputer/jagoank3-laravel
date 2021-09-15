<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{$selected=='dashboard' ? 'active':''}}" aria-current="page" href="{{ url('/dashboard') }}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Training</span>
        </h6>
        <li class="nav-item">
            <a class="nav-link {{$selected=='training' ? 'active':''}}" href="{{ url('/training') }}">
              <span data-feather="file-text"></span>
              Training
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{($selected=='kategoritraining' ? 'active':'')}}" href="{{ url('/kategoritraining') }}">
              <span data-feather="file-text"></span>
              Kategori Training
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{($selected=='vouchertraining' ? 'active':'')}}" href="{{ url('/vouchertraining') }}">
              <span data-feather="file-text"></span>
              Voucher Training
            </a>
          </li>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Master</span>
        </h6>
        <li class="nav-item">
            <a class="nav-link {{$selected==='instruktur' ? 'active':''}}" href="{{ url('/instruktur') }}">
              <span data-feather="file-text"></span>
              Instruktur
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link {{$selected==='shop' ? 'active':''}}" href="{{ url('/shop') }}">
              <span data-feather="file-text"></span>
              Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{($selected=='galeri' ? 'active':'')}}" href="{{ url('/galeri') }}">
              <span data-feather="file-text"></span>
              Galeri
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{($selected=='artikel') ? 'active':''}}" href="{{ url('/artikel') }}">
              <span data-feather="file-text"></span>
              Artikel
            </a>
          </li>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Account</span>
        </h6>
        <li class="nav-item">
            <a class="nav-link {{($selected=='user') ? 'active':''}}" href="{{ url('/user') }}">
              <span data-feather="file-text"></span>
              User
            </a>
          </li>




          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Reports</span>
        </h6>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/order') }}">
              <span data-feather="file-text"></span>
              Invoice Training
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/order') }}">
              <span data-feather="file-text"></span>
              Invoice Shop
            </a>
          </li>


          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Extra</span>
        </h6>
        <li class="nav-item">
            <a class="nav-link {{($selected=='banner' ? 'active':'')}}" href="{{ url('/banner') }}">
              <span data-feather="file-text"></span>
              Banner
            </a>
          </li>
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