<body class="vertical  light  ">
    <div class="wrapper">
    <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="" data-toggle="modal" data-target=".modal-shortcut">
              <span class="fe fe-grid fe-16"></span>
            </a>
          </li>
          <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="/logout" >
              <span class="fe fe-bell fe-16"></span>
              <span class="dot dot-md bg-success"></span>
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
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
          </div>
         
          <ul class="navbar-nav flex-fill w-100 mb-2">
  
              
            <li class="nav-item w-100">
              <a class="nav-link" href="/admin/dashboard">
                <i class="fe fe-layers fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
              </a>
</li>

          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Apps</span>
          </p>

          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/admin/kategori">
                <i class="fe fe-grid fe-16"></i>
                <span class="ml-3 item-text">Kategori</span>
              </a>
            </li>

            <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/admin/user">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">User</span>
              </a>
            </li>

             <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/admin/produk">
                <i class="fe fe-package fe-16"></i>
                <span class="ml-3 item-text">Produk</span>
              </a>
            </li>

            <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/admin/transaksi">
                <i class="fe fe-credit-card fe-16"></i>
                <span class="ml-3 item-text">Transaksi</span>
              </a>
            </li>

        
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Extra</span>
          </p>

          <div class="btn-box w-100 mt-4 mb-1">
            <a href="/admin/transaksi/create" class="btn mb-2 btn-primary btn-lg btn-block">
              <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Buy now</span>
            </a>
          </div>
        </nav>
      </aside>
