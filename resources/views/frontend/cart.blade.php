@extends('layouts.frontend')

@section('title')
    LouraMarket | Mi Carrito
@endsection

@section('content')
<div class="navigatorDiv py-3 mb-4 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
                Inicio
            </a> <span class="text-white">/</span>
            <a href="{{ url('cart/') }}">
                 Carrito
            </a>
        </h6>
    </div>
    <div class="spinner-border text-primary spLoading position-absolute top-25 start-50" style="display:none;"></div>
</div>

    
    <div class="container my-5">
        <h4>Mi Carrito:</h4>
        <div class="card shadow">
          @if ($cartItems->count() > 0)
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                @foreach ($cartItems as $item)               
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" alt="Image"  width="75px" height="75px">
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>{{ $item->products->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{ $item->products->selling_price }}€</h6>
                        </div>
                        <div class="col-md-3 my-auto">
                            <input class="prod_id" type="hidden" value="{{ $item->prod_id }}">
                            <!--Controla si el stock del producto es inferior a 0 antes de comprarlo-->
                            <data class="quantityRem no-border" value="{{ $item->products->quantity}}"></data>
                            @if ($item->products->quantity >= $item->prod_quantity)
                                <label for="Quantity">Cantidad</label>
                                <div class="input-group text-center mb-3" style="width: 130px">
                                    @if ($item->prod_quantity == 1)
                                    <button class="input-group-text bg-white" disabled>-</button>
                                    @else
                                    <button class="btnDecrement changeQuantity input-group-text">-</button>
                                    @endif
                                    <input type="number" class="form-control quantityInput text-center" name="quantity" value="{{ $item->prod_quantity }}">
                                    @if ($item->products->quantity == $item->prod_quantity)
                                    <button class="input-group-text bg-white" disabled>+</button>
                                    @else
                                    <button class="btnIncrement changeQuantity input-group-text">+</button>
                                    @endif
                                </div>
                                @php
                                    $total += $item->products->selling_price * $item->prod_quantity;
                                @endphp
                            @else
                                <h6>Fuera de Stock</h6>
                            @endif
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btnDeleteCartItem btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                        </div>
                    </div>
                 @endforeach
            </div>
            <div class="card-footer">
                <h6>Total: <b>{{ $total }}€</b>
                    <a href="{{ url('checkout') }}" class="btn btn-outline-success bg-gradient float-end">Proceda a pagar <i class='fas fa-arrow-right'></i></a>
                </h6>
            </div>
            @else
                <div class="card-body text-center">
                    <i class="emptyCartFa fa fa-shopping-cart fa-9x mt-4 mb-4"></i>
                    <br>
                    <h3>Su Carrito está vacío</h3>
                    <h6 style="color: rgb(121, 121, 121)">Una vez que hayas agregado artículos a su carrito de compras, puede pagar desde aquí.</h6>
                        <a href="{{ url('category') }}" class="btn btn-outline-success text-center mt-3 mb-5 w-50">Seguir comprando</a>
                </div>
            @endif
        </div>
    </div>
@endsection