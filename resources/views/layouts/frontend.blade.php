<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
     <!--     Fonts and icons     -->
     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
     <!-- Font Awesome Icons -->
     <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
     <!-- Material Icons -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
     <!-- CSS Files -->
     <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
     <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
     <!--Sweet Alert 2-->
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <!--Owl Carousel-->
     <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
     <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
     <!--Jquery-->
     <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
     <!--Favicon-->
     <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logoIcon.png') }}">
     <link rel="shortcut icon" sizes="192x192" href="{{ asset('assets/images/logoIcon.png') }}">
     

     <style>
          a{
               text-decoration: none !important;
          }
     </style>
</head>
<body>
    
    @guest
    @else
          @if (Auth::user()->role_as == '1')
          <div class="bg-secondary bg-gradient"><a href="/dashboard" class="ms-2 text-black"><u class="adminCp">Ir al Panel de Control <i class="fa fa-gear"></i></u></a></div>
    @endif
    @endguest
     
    @include('layouts.inc.frontnavbar')

    <div class="content">
        @yield('content')
    </div>

    
     <!-- Scripts -->
     <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
     <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('frontend/js/custom.js') }}"></script>
     <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


     <script>
          window.onscroll = function() {myFunction()};
          
          var header = document.getElementById("navbarHeader");
          var sticky = header.offsetTop;
          
          function myFunction() {
            if (window.pageYOffset > sticky) {
              header.classList.add("sticky");
            } else {
              header.classList.remove("sticky");
            }
          }
     </script>

     <!--Tawk.to-->
     <!--Start of Tawk.to Script-->
     <script type="text/javascript">
          var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
          (function(){
          var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
          s1.async=true;
          s1.src='https://embed.tawk.to/628658f8b0d10b6f3e731109/1g3ecn326';
          s1.charset='UTF-8';
          s1.setAttribute('crossorigin','*');
          s0.parentNode.insertBefore(s1,s0);
          })();
     </script>
<!--End of Tawk.to Script-->
     <!--Fin Tawk.to-->

     <!--Search Products-->
     <script>
          var availableTags = [];
          $.ajax({
               type: "GET",
               url: "/product-list ",
               success: function (response) {
                    startAutoComplete(response);
               }
          });

          function startAutoComplete(availableTags){
               $( "#searchProducts" ).autocomplete({
               source: availableTags
               });
          }
     </script>
     <!--Fin Search Products-->

     <!-- Cookie Consent by https://www.FreePrivacyPolicy.com -->
     <script type="text/javascript" src="//www.freeprivacypolicy.com/public/cookie-consent/4.0.0/cookie-consent.js" charset="UTF-8"></script>
     <script type="text/javascript" charset="UTF-8">
     document.addEventListener('DOMContentLoaded', function () {
     cookieconsent.run({"notice_banner_type":"interstitial","consent_type":"express","palette":"light","language":"es","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false});
     });
     </script>

     <noscript>Cookie Consent by <a href="https://www.freeprivacypolicy.com/" rel="nofollow noopener">Free Privacy Policy Generator website</a></noscript>
     <!-- End Cookie Consent -->   

     
     @if (session('status'))
          <script>
               Swal.fire({
                    position: 'top',
                    title: '{{ session('status') }}',
                    showConfirmButton: false,
                    timer: 1500
               })
        </script>

     @endif

     @yield('scripts')

</body>
<footer>
     @include('layouts.inc.frontfooter')
</footer>
</html>
