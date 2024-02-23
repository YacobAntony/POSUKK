<body class="vertical  light  ">
    <div class="wrapper">
    <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <ul class="nav">

        <li class="nav-item">
    <a class="nav-link text-muted my-2" href="#" data-toggle="modal" data-target="#customModal">
        <span class="fe fe-users fe-16"></span>
    </a>
</li>  
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
  <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="">
    See <br>
   <strong>Audio</strong> 
  </a>
</div>


        
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
            @if(auth()->user()->role != "kasir")
              <a class="nav-link" href="/admin/dashboard">
                @endif
              @if(auth()->user()->role != "admin")
              <a class="nav-link" href="/kasir/dashboarduser">
                @endif
                <i class="fe fe-layers fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
              </a>
             </li>

          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Apps</span>
          </p>
            
          @if(auth()->user()->role != "kasir")
    <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item w-100">
            <a class="nav-link" href="/admin/kategori">
                <i class="fe fe-grid fe-16"></i>
                <span class="ml-3 item-text">Kategori</span>
            </a>
        </li>
    </ul>
@endif

             @if(auth()->user()->role != "kasir")
            <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/admin/user">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">User</span>
              </a>
            </li>
            @endif

            @if(auth()->user()->role != "kasir")
             <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/admin/produk">
                <i class="fe fe-headphones fe-16"></i>
                <span class="ml-3 item-text">Produk</span>
              </a>
            </li>
             @endif
<!----------------------------------------------------------------- -->
              @if(auth()->user()->role != "kasir")
            <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/admin/transaksi">
                <i class="fe fe-credit-card fe-16"></i>
                <span class="ml-3 item-text">Transaksi</span>
              </a>
            </li>
            @endif
            @if(auth()->user()->role != "admin")
            <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/kasir/transaksi">
                <i class="fe fe-credit-card fe-16"></i>
                <span class="ml-3 item-text">Transaksi</span>
              </a>
            </li>
            @endif

            @if(auth()->user()->role != "kasir")
            <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/admin/transaksidetail">
                <i class="fe fe-file-text fe-16"></i>
                <span class="ml-3 item-text">Laporan</span>
              </a>
            </li>
            @endif
<!---------------------------------------------------------------------- -->
        
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Extra</span>
          </p>
          @if(auth()->user()->role != "admin")
          <div class="btn-box w-100 mt-4 mb-1">
            <a href="/kasir/transaksi/create" class="btn mb-2 btn-primary btn-lg btn-block">
              <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Transaksi Sekarang</span>
            </a>
          </div>
@endif
@if(auth()->user()->role != "kasir")
          <div class="btn-box w-100 mt-4 mb-1">
            <a href="/admin/transaksi/create" class="btn mb-2 btn-primary btn-lg btn-block">
              <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Transaksi Sekarang</span>
            </a>
          </div>
@endif
        </nav>


      </aside>

      
<!-- Modal -->
<div class="modal fade modal-right modal-slide" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customModalLabel">Informasi Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Role:</strong>  {{ auth()->user()->role }} </p>
                <!-- Tambah informasi lain sesuai kebutuhan -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href="/logout"class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>

