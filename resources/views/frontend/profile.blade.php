@extends('layouts.frontend')

@section('title')
    LouraMarket | Perfil
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Mi Perfil
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('save-profile') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row ">
                            <div class="col-md-6">
                                <label>Nombre</label>
                                <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" placeholder="Introduzca su Nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label>Apellidos</label>
                                <input type="text" class="form-control lastname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Introduzca su Apellido">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Email</label>
                                <input type="email" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Introduzca su Email" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Número de Teléfono</label>
                                <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Introduzca su Número de Teléfono">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Dirección</label>
                                <input type="text" class="form-control address" value="{{ Auth::user()->address }}" name="address" placeholder="Introduzca su Dirección">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>País</label>
                                <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Introduzca su País">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Estado/provincia</label>
                                <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Introduzca su Estado/Provincia">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Ciudad</label>
                                <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Introduzca su Ciudad">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Código Postal</label>
                                <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Introduzca su CP">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary pt-2 pb-2 mb-3 float-end"><b>Guardar Cambios</b> <i class='fa fa-save'></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
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
            url: "/save-profile",
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
        });
    </script>
@endsection