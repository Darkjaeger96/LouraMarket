@extends('layouts.frontend')

@section('title')
   LouraMarket | Categorías
@endsection

@section('content')

<div class="navigatorDiv py-3 mb-4 shadow-sm border-top">
   <div class="container">
      <h6 class="mb-0">
         <a href="{{ url('category') }}">
            Categorías
         </a>
      </h6>
   </div>
</div>

   <div class="my-5">
      <div class="container">
         <div class="col-md-12">
            <h2>Todas las categorías</h2>
            <div class="row">
               @foreach ($category as $c)
                  <div class="col-md-3 mb-3">
                     <a href="{{ url('view-category/'.$c->slug) }}">
                        <div class="cardShow card">
                           <img class="categoryImage" src="{{ asset('assets/uploads/category/'.$c->image) }}" alt="Category image">
                           <div class="card-body text-black">
                              <h5>{{ $c->name }}</h5>
                             <p>
                                {{ $c->description }}
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


