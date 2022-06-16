@extends('layouts.frontend')

@section('title')
    LouraMarket | Pago
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
                </a> <span class="text-white">/</span>
                <a href="{{ url('checkout/') }}">
                    Pago
                </a>
            </h6>
        </div>
        <div class="spinner-border text-primary spLoading position-absolute top-25 start-50" style="display:none;"></div>
    </div>
    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6>Detalles básicos</h6>
                            <hr>
                            <div class="row checkoutForm">
                                <div class="col-md-6">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" placeholder="Introduzca su Nombre" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control lastname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Introduzca su Apellido" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Introduzca su Email" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Número de Teléfono</label>
                                    <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Introduzca su Número de Teléfono" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control address" value="{{ Auth::user()->address }}" name="address" placeholder="Introduzca su Dirección" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>País</label>
                                    <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Introduzca su País" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Estado/provincia</label>
                                    <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Introduzca su Estado/Provincia" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Ciudad</label>
                                    <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Introduzca su Ciudad" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Código Postal</label>
                                    <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Introduzca su CP" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card shadow-sm">
                       
                        <div class="card-body">
                            @php
                                $total = 0;
                            @endphp
                            <h6>Detalles del Pedido</h6>
                            <hr>
                            @if ($cartItems->count() > 0)
                            <table class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($cartItems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_quantity }}</td>
                                            <td>{{ $item->products->selling_price }}€</td> 
                                        </tr>
                                        @php
                                            $total += $item->products->selling_price * $item->prod_quantity;
                                        @endphp
                                        @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <div class="mb-4 text-center">
                                <h3>Total: <b>{{ $total }}€</b> </h3>
                            </div>
                            <button type="submit" class="btn btn-primary pt-2 pb-2 w-100 mb-3"><b>Pedir Ahora</b></button>
                            <div id="paypal-button-container"></div>
                        </div>
                        @else
                            <h5 class="text-center">No hay productos en el carrito</h5>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AX47JU2WmUvutIRJcUfVoX5WVGHZXQ54O0kQeaEmcJayD0BQzaXmAfdcCFMbOofIITKh2IMrDDke75m0"></script>
    <script>
        paypal.Buttons({
          // Sets up the transaction when a payment button is clicked
          createOrder: (data, actions) => {
            return actions.order.create({
              purchase_units: [{
                amount: {
                  value: '{{ $total }}' // Can also reference a variable or function
                }
              }]
            });
          },
          // Finalize the transaction after payer approval
          onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
              // Successful capture! For dev/demo purposes:
              // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              //const transaction = orderData.purchase_units[0].payments.captures[0];
              //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
              
              
              let firstname = $('.firstname').val();
              let lastname = $('.lastname').val();
              let email = $('.email').val();
              let phone = $('.phone').val();
              let address = $('.address').val();
              let country = $('.country').val();
              let state = $('.state').val();
              let city = $('.city').val();          
              let pincode = $('.pincode').val();

              $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

              $.ajax({
                  type: "POST",
                  url: "/place-order",
                  data: {
                      'fname':firstname,
                      'lname':lastname,
                      'email':email,
                      'phone':phone,
                      'address':address,
                      'country':country,
                      'state':state,
                      'city':city,
                      'pincode':pincode,
                  },
                  success: function (response) {
                        Swal.fire({
                            position: 'top',
                            title: "Transacción Completa",
                            showConfirmButton: false,
                            timer: 2000
                        })
                        window.location.href = "/my-orders";
                    }
              });
            });
          }
        }).render('#paypal-button-container');
      </script>
@endsection