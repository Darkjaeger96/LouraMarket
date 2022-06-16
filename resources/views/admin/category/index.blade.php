@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Categorías</h1>
        </div>
        <div class="card-body">
            <table class="table table-borderer table-striped">
                <thead>
                    <tr class="category-tr">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)  
                        <tr class="category-tr">
                            <td>{{ $item -> id }}</td>
                            <td>{{ $item -> name }}</td>
                            <td>{{ $item -> description }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/category/'.$item -> image) }}" class="category-image" alt="Image">
                            </td>
                            <td>
                                <a href="{{ url('edit-category/'.$item->id)}}" class="btn btn-primary">Editar</a>
                                <a href="{{ url('delete-category/'.$item->id)}}" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    
@endsection