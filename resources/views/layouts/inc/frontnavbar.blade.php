<div id="navbarHeader">
<nav class="frontNavbar navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><span>Loura</span>Market</a>

      <div class="searchInput">
        <form action="{{ url('search-product') }}" method="POST">
          @csrf
          <div class="input-group">
            <input id="searchProducts" type="search" class="form-control" name="productName" placeholder="Buscar..." required>
            <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('category') }}">Categorías</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link" href="{{ url('/faq') }}">FAQs</a>
          </li>
          <li class="nav-item" title="Carrito">
            <a class="nav-link" href="{{ url('cart') }}">
              <i class="fa fa-shopping-cart"></i> <small><span class="badge badge-pill bg-primary cartCount">0</span></a></small>
          </li>
          <li class="nav-item" title="Lista de Deseos">
            <a class="nav-link" href="{{ url('wishlist') }}">
              <i class="fa fa-heart"></i> <small><span class="wishBadge badge badge-pill wishlistCount">0</span></a></small>
          </li>
          <div class="navSeparator ms-3 me-4"></div>
          @guest
               @if (Route::has('login'))
                   <li class="navLoginBtn nav-item border border-light rounded text-center me-2">
                       <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                   </li>
               @endif

               @if (Route::has('register'))
                   <li class="navRegisterBtn nav-item border border-light text-center rounded me-2">
                       <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                   </li>
               @endif
           @else
           <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               {{ Auth::user()->name }}
               </a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <li>
                      <a class="dropdown-item" href="{{ url('my-orders') }}">
                        Mis Pedidos
                      </a>
                   </li> 
                   <li>
                       <a class="dropdown-item" href="{{ url('my-profile') }}">
                         Mi Perfil
                       </a>
                   </li>
                   <li>
                       <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
                           {{ __('Cerrar sesión') }}
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                       </form>
                   </li>
               </ul>
           </li>
           @endguest

        </ul>
      </div>
    </div>
  </nav>
</div>