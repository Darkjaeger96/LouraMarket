@extends('layouts.frontend')

@section('title')
    LouraMarket | Lista de Deseos
@endsection

@section('content')
<div class="navigatorDiv py-3 mb-4 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
                Inicio
            </a> <span class="text-white">/</span>
            <a href="{{ url('wishlist/') }}">
                 Lista de Deseos
            </a>
        </h6>
    </div>
    <div class="spinner-border text-primary spLoading position-absolute top-25 start-50" style="display:none;"></div>
</div>

    <div class="container my-5">
        <h4>Mi Lista de Deseos:</h4>
        <div class="card shadow">
            <div class="card-body">
                @if($wishlist->count() > 0)
                    @foreach ($wishlist as $item)               
                        <div class="row product_data">
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" alt="Image"  width="75px" height="75px">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->products->name }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->products->selling_price }}€</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input class="product_id" type="hidden" value="{{ $item->product_id }}">
                                <data class="quantityWishRem no-border" value="{{ $item->products->quantity}}"></data>
                                @if ($item->products->quantity > $item->prod_quantity)
                                    <label for="Quantity">Cantidad</label>
                                    <div class="input-group text-center mb-3" style="width: 130px">
                                        <button class="btnWishDecrement input-group-text">-</button>
                                        <input type="text" class="form-control quantityWishInput text-center" name="quantity" value="1">
                                        <button class="btnWishIncrement input-group-text">+</button>
                                    </div>
                                @else
                                    <h6>Fuera de Stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-primary btnAddWishToCart">Añadir al carrito <i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger btnDeleteWishItem "><i class="fa fa-trash"></i> Eliminar</button>
                            </div>
                        </div>
                     @endforeach
                @else
                <div class="card-body text-center">
                    <i class="emptyCartFa fa fa-frown-o fa-9x mt-4 mb-4"></i>
                    <br>
                    <h3>No hay productos en tu lista de deseos</h3>
                    <h6 style="color: rgb(121, 121, 121)">Agrega productos a tu lista de deseos, una vez agregados podrás ver tu lista de productos deseados <b>aquí</b>.</h6>
                        <a href="{{ url('category') }}" class="btn btn-outline-success text-center mt-3 mb-5 w-50">Seguir comprando</a>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection