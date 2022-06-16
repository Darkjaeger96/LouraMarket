@extends('layouts.admin')

@section('title')
    Pedidos
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-dark">
                    <h4 class="text-white pt-2">Nuevos Pedidos
                        <a href="{{ 'order-history' }}" class="btn btn-warning float-end">
                            <i class="material-icons opacity-10">history</i>
                            Historial
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Fecha del Pedido</th>
                                <th>Número de seguimiento</th>
                                <th>Precio total</th>
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
                                        <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
    
@endsection