@extends('layouts.frontend')

@section('title')
   LouraMarket | {{ $category->name }}
@endsection

@section('content')

<div class="navigatorDiv py-3 mb-4 shadow-sm border-top">
   <div class="container">
       <h6 class="mb-0">
         <a href="{{ url('category') }}">
            Categorías
         </a> <span class="text-white">/</span>
         <a href="{{ url('view-category/' .  $category->slug) }}">
            {{ $category->name }}
         </a>
      </h6>
   </div>
</div>

   <div class="py-5">
      <div class="container">
         <div class="row">
            <h2>{{ $category->name }}</h2>
            @if (count($products) == 0)
               <h3 class="text-center text-secondary mt-5">Nada que mostrar...</h3>
            @else
            <p>Mostrando {{ count($products) }}</p>
               @foreach ($products as $p)
                  <div class="col-md-3 mb-3">
                     <div class="cardShow card">
                        <a href="{{url('category/'.$category->slug.'/'.$p->slug)}}">
                           <div class="text-center">
                              <img class="productImage" src="{{ asset('assets/uploads/products/'.$p->image) }}" alt="Product image" width="200px">
                           </div>
                           <div class="card-body">
                              <a class="linkCard text-secondary" href="{{ url('view-category/' .  $category->slug) }}">
                                 {{ $category->name }}
                              </a>
                              @if ($p->selling_price != $p->original_price)
                                 <span class="float-end text-danger"><s><small>{{ $p->original_price }}€</small></s></span> 
                              @endif
                              <h5>
                                 <a class="text-black" href="{{url('category/'.$category->slug.'/'.$p->slug)}}">{{ $p->name }}</a>
                                 <span class="float-end">{{ $p->selling_price }}€</span>
                              </h5>
                        </div>
                        </a>
                        <div class="card-footer">
                           <span class="text-center">{{ $p->small_description }}</span>
                           <br>
                           <a class="linkCard float-end text-secondary" href="{{url('category/'.$category->slug.'/'.$p->slug)}}">Leer más...</a>
                        </div>
                        
                     </div>
                  </div>
               @endforeach
               @endif
         </div>
      </div>
   </div>
@endsection


