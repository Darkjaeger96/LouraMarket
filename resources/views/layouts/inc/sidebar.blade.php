<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/">
        <img src="https://demos.creative-tim.com/material-dashboard/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="logo">
        <span class="ms-1 font-weight-bold text-white">LouraMarket</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard') ? 'active bg-gradient-primary':'' }} " href="../dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Panel de Control</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('categories') ? 'active bg-gradient-primary':'' }}" href="{{url('categories')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">border_all</i>
            </div>
            <span class="nav-link-text ms-1">Categorías</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white  {{ Request::is('add-category') ? 'active bg-gradient-primary':'' }}" href="{{url('add-category')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add_to_photos</i>
            </div>
            <span class="nav-link-text ms-1">Añadir Categoría</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('products') ? 'active bg-gradient-primary':'' }}" href="{{url('products')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">apps</i>
            </div>
            <span class="nav-link-text ms-1">Productos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white  {{ Request::is('add-products') ? 'active bg-gradient-primary':'' }}" href="{{url('add-products')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add_box</i>
            </div>
            <span class="nav-link-text ms-1">Añadir Productos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white  {{ Request::is('orders') ? 'active bg-gradient-primary':'' }} {{ Request::is('order-history') ? 'active bg-gradient-primary':'' }}" href="{{url('orders')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">content_paste</i>
            </div>
            <span class="nav-link-text ms-1">Pedidos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white  {{ Request::is('users') ? 'active bg-gradient-primary':'' }}" href="{{url('users')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">people</i>
            </div>
            <span class="nav-link-text ms-1">Usuarios</span>
          </a>
        </li>

      </ul>
    </div>
   
  </aside>