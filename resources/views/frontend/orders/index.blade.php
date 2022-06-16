@extends('layouts.frontend')

@section('title')
    LouraMarket | Mis Pedidos
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white pt-2">Mis Pedidos</h4>
                    </div>
                    @if ($orders->count() > 0)
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Fecha del Pedido</th>
                                    <th>Número de seguimiento</th>
                                    <th>Precio Total</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @foreach ($orders as $item)
                                    <tr class="bg-light">
                                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->tracking_num }}</td>
                                        <td>{{ $item->total_price }}€</td>
                                        <td>
                                            @if ($item->status == '0')
                                                <span style="color: orange">pendiente...</span>
                                            @else
                                                <span style="color: green">completado</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-primary">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="card-body text-center">
                        <i class="emptyCartFa fa fa-truck fa-9x mt-4 mb-4"></i>
                        <br>
                        <h3>Aún no has realizado ningún pedido</h3>
                        <h6 style="color: rgb(121, 121, 121)">Una vez hayas realizado un pedido, podrás verlo desde aquí.</h6>
                            <a href="{{ url('category') }}" class="btn btn-outline-success text-center mt-3 mb-5 w-50">Seguir comprando</a>
                    </div>
                    @endif
                </div>
               
            </div>
        </div>
    </div>
@endsection