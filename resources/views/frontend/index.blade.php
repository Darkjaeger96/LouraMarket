@extends('layouts.frontend')

@section('title')
    LouraMarket | Inicio
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Productos Destacados</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featuredProducts as $p)

                    <div class="item">
                        <div class="cardShow card">
                           <a  href="{{url('category/'.$p->category->slug.'/'.$p->slug)}}">
                              <div class="text-center">
                                 <img class="productImage"src="{{ asset('assets/uploads/products/'.$p->image) }}" alt="Product image" width="200px">
                              </div>
                              <div class="card-body">
                                 <a class="linkCard text-secondary" href="{{ url('view-category/' .  $p->category->slug) }}">
                                    {{ $p->category->name }}
                                 </a>
                                 @if ($p->selling_price != $p->original_price)
                                    <span class="float-end text-danger"><s><small>{{ $p->original_price }}€</small></s></span> 
                                 @endif
                                 <h5>
                                    <a class="text-black" href="{{url('category/'.$p->category->slug.'/'.$p->slug)}}">{{ $p->name }}</a>
                                    <span class="float-end">{{ $p->selling_price }}€</span>
                                 </h5>
                           </div>
                           </a>
                        </div>
                     </div>
                    @endforeach
                </div>  
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                
                <h2>
                    Categorías más Populares
                    <a class="nav-link text-secondary float-end h5 d-none d-md-block d-lg-block d-sl-block" href="{{ url('category') }}">Ver todas...</a>
                </h2>

                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($popularCategories as $popCat)
                        <div class="item">
                            <a href="{{ url('view-category/'.$popCat->slug) }}">
                                <div class="cardShow card">
                                    <img class="categoryImage" src="{{ asset('assets/uploads/category/'.$popCat->image) }}" alt="Category image">
                                    <div class="card-body text-black">
                                        <h5>{{ $popCat->name }}</h5>
                                        <p>
                                            {{ $popCat->description }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>  
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })    
    </script>    
@endsection