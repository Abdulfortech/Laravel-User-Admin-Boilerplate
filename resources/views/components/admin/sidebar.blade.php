<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{route('admin.dashboard')}}" target="_blank">
        <!-- <img src="../assets/images/logo.jpg" class="navbar-brand-img" style="width: 50px; height:70px" alt="main_logo"> -->
        <!-- <span class="ms-1 font-weight-bold fw-bold">BAMS</span> -->
        <h3 class="fw-bolder text-center">One-Stop</h3>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'index') ? 'active' : ''; ?>" href="{{route('admin.dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'components') ? 'active' : ''; ?>" href="{{route('admin.components')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-sitemap text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Components</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'admins') ? 'active' : ''; ?>" href="{{route('admins')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Admins</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'suppliers') ? 'active' : ''; ?>" href="{{route('admin.suppliers')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Suppliers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'users') ? 'active' : ''; ?>" href="{{route('admin.users')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'products') ? 'active' : ''; ?>" href="{{route('admin.products')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'orders') ? 'active' : ''; ?>" href="{{route('admin.orders')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-shopping-cart text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'payments') ? 'active' : ''; ?>" href="{{route('admin.dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-credit-card text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Payments</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'deliveries') ? 'active' : ''; ?>" href="{{route('admin.dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-credit-card text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Deliveries</span>
          </a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'reviews') ? 'active' : ''; ?>" href="{{route('admin.dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-comments text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Reviews</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'reports') ? 'active' : ''; ?>" href="{{route('admin.dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-comments text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Reports</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link <?php echo ($page == 'messages') ? 'active' : ''; ?>" href="{{route('admin.dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-envelope text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Messages</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'analytics') ? 'active' : ''; ?>" href="{{route('analytics')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-credit-card text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Analytics</span>
          </a>
        </li> --}}

      </ul>
    </div>
</aside>