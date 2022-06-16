<footer class="bg-dark text-center text-white mt-5">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="{{url('/')}}" class="footerNavLink px-2">Inicio</a></li>
            <li class="nav-item"><a href="{{ url('category') }}" class="footerNavLink px-2">Categorías</a></li>
            @guest
            <li class="nav-item"><a href="{{ route('login') }}" class="footerNavLink px-2">Iniciar Sesión</a></li>
            <li class="nav-item"><a href="{{ route('register') }}" class="footerNavLink px-2">Registrarse</a></li>
            @else
                 <li class="nav-item"><a href="{{ url('/cart') }}" class="footerNavLink px-2">Carrito</a></li>
                 <li class="nav-item"><a href="{{ url('/wishlist') }}" class="footerNavLink px-2">Lista de Deseos</a></li>
            @endguest
            <li class="nav-item"><a href="{{ url('/faq') }}" class="footerNavLink px-2">FAQs</a></li>
          </ul>
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Twitter -->
        <a class="btn btn-sm btn-outline-light btn-floating rounded-circle m-1" href="https://twitter.com/?lang=es" role="button"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Google -->
        <a class="btn btn-sm btn-outline-light btn-floating rounded-circle m-1" href="https://www.google.com/" role="button"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram -->
        <a class="btn btn-sm btn-outline-light btn-floating rounded-circle m-1" href="https://www.instagram.com/" role="button"
          ><i class="fab fa-instagram"></i
        ></a>
  
        <!-- Linkedin -->
        <a class="btn btn-sm btn-outline-light btn-floating rounded-circle m-1" href="https://es.linkedin.com/" role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>
  
        <!-- Github -->
        <a class="btn btn-sm btn-outline-light btn-floating rounded-circle m-1" href="https://github.com/" role="button"
          ><i class="fab fa-github"></i
        ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright:
      <a class="text-white">Jesús Villar García</a>
    </div>
    <!-- Copyright -->
  </footer>