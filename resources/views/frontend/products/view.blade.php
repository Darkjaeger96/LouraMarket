@extends('layouts.frontend')

@section('title')
   LouraMarket | {{ $products->name }}
@endsection

@section('content')

<div class="navigatorDiv py-3 mb-4 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('category') }}">
                Categorías
            </a> <span class="text-white">/</span>
            <a href="{{ url('view-category/' .  $products->category->slug) }}">
                 {{ $products->category->name }}
            </a> <span class="text-white">/</span> 
            <a href="{{ url('category/' .  $products->category->slug . '/' . $products->slug) }}">
                {{ $products->name }}
            </a>
        </h6>
    </div>
</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100" alt="Product Image">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-4">
                        {{ $products->name }}
                        @if ( $products->trending == '1')
                            <label id="trendingLavel" class="float-end badge bg-danger trending_tag">Tendencias</label>
                        @endif
                    </h2>

                    @if ($products->selling_price != $products->original_price)
                        <label class="me-3">Precio Original: <s class="text-danger">{{ $products->original_price }}€</s></label>
                    @endif
                    <label class="fw-bold">Precio de venta: {{ $products->selling_price }}€</label>
                    <br>
                    @if ($products->quantity <= 0)
                        <label class="me-3 small">No quedan unidades</label>
                    @else
                        <label class="me-3 small">Quedan: {{ $products->quantity }} unidades</label>
                    @endif
                    <p class="mt-3">
                        {!! $products->small_description !!}
                    </p>

                    <hr>

                    @if ($products->quantity < 10 && $products->quantity > 0)
                        <label class="badge bg-warning">Pocas unidades</label>
                    @elseif ($products->quantity > 0)
                        <label class="badge bg-success">En stock</label>
                    @else
                        <label class="badge bg-danger">Fuera de stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input class="product_id" type="hidden" value="{{ $products->id }}">
                            <data class="productRem no-border" value="{{ $products->quantity}}"></data>
                            <label for="Quantity">Cantidad</label>
                            <div class="input-group text-center mb-3">
                                @if ($products->quantity >= 1)
                                    <button class="btnDecrement input-group-text">-</button>
                                    <input type="text" name="quantity" value="1" max="{{ $products->quantity }}" class="quantityInput form-control text-center">
                                    <button class="btnIncrement input-group-text">+</button>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-10">
                            <br>
                            @if ($products->quantity > 0)
                                <button class="btn btn-primary me-3 float-start btnAddToCart">Añadir al Carrito <i class="fa fa-shopping-cart"></i></button>
                            @endif
                                <button class="btn btn-danger rounded-pill me-3 float-start btnAddToWishlist" title="Añadir a la Lista de Deseos"><i class="fa fa-heart"></i> Me gusta</button>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <h3 class="mb-4">Descripción</h3>
                <p class="mt-3">
                    {!! $products->description !!}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
