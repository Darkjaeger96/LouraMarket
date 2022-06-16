@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Usuarios Registrados</h4>
        </div>
        <div class="card-body">
            <table class="table table-borderer table-striped">
                <thead>
                    <tr class="category-tr">
                        <th>Id</th>
                        <th>nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $usr)  
                        <tr class="category-tr">
                            <td>{{ $usr->id }}</td>
                            <td>{{ $usr->name }} {{ $usr->lname }}</td>
                            <td>{{ $usr->email}}</td>
                            <td>{{ $usr->phone}}</td>
                            <td>
                                <a href="{{ url('view-user/'.$usr->id) }}" class="btn btn-primary btn-sm">Más Info</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    
@endsection