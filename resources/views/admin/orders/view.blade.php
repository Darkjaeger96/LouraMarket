@extends('layouts.admin')

@section('title')
   Mis Pedidos
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white pt-2">Vista del Pedido
                            <a class="btn btn-primary text-white float-end" href="{{ url('orders') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 orderDetails">
                                <h4>Detalles del Envío</h4>
                                <hr>
                                <label class="ms-0 p-1 mb-0">Nombre</label>
                                <div class="border p-1 mb-2">{{ $orders->fname }}</div>
                                <label class="ms-0 p-1 mb-0">Apellidos</label>
                                <div class="border p-1 mb-2">{{ $orders->lname }}</div>
                                <label class="ms-0 p-1 mb-0">Email</label>
                                <div class="border p-1 mb-2">{{ $orders->email }}</div>
                                <label class="ms-0 p-1 mb-0">Teléfono</label>
                                <div class="border p-1 mb-2">{{ $orders->phone }}</div>
                                <label class="ms-0 p-1 mb-0">Dirección de envío</label>
                                <div class="border p-1 mb-2">
                                    {{ $orders->address }}, <br>
                                    {{ $orders->country }}, <br>
                                    {{ $orders->state }},
                                    {{ $orders->city }}
                                </div>
                                <label class="ms-0 mb-0">Código postal</label>
                                <div class="border p-1">{{ $orders->pincode }}</div>


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
                                <h4 class="px-2">Total: <span class="float-end">{{ $orders->total_price }}€</span> </h4>
                                <div class="mt-5 px-2">
                                    <label class="ms-0 mb-0">Estado del Pedido</label>
                                    <form action="{{ url('update-order/' . $orders->id) }}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                        <select class="form-select" name="orderStatus">
                                            <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pendiente</option>
                                            <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completado</option>
                                        </select>
                                        <button type="submit" class="btn btn-danger mt-3 me-2 float-end">Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection