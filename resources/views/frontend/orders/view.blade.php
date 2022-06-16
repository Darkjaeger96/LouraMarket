@extends('layouts.frontend')

@section('title')
    LouraMarket | Mis pedidos
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white pt-2">Pedido
                            <a class="btn btn-primary text-white float-end" href="{{ url('my-orders') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 orderDetails">
                                <h4>Detalles del Envío</h4>
                                <hr>
                                <label for="">Nombre</label>
                                <div class="border">{{ $orders->fname }}</div>
                                <label for="">Apellidos</label>
                                <div class="border">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border">{{ $orders->email }}</div>
                                <label for="">Teléfono</label>
                                <div class="border">{{ $orders->phone }}</div>
                                <label for="">Dirección de Envío</label>
                                <div class="border">
                                    {{ $orders->address }}, <br>
                                    {{ $orders->country }}, <br>
                                    {{ $orders->state }},
                                    {{ $orders->city }}
                                </div>
                                <label for="">Código Postal</label>
                                <div class="border p-2">{{ $orders->pincode }}</div>


                            </div>
                            <div class="col-md-6">
                                <h4>Detalles del Pedido</h4>
                                <hr>
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        @foreach ($orders->orderItems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }}€</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt="Product Image" width="55px">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Total Final: <span class="float-end">{{ $orders->total_price }}€</span> </h4>
                                
                                <a class="btn btn-danger text-white float-end mt-5" href="{{ url('download-pdf/' . $orders->id) }}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                            </div>
                           
                        </div>
                      
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection