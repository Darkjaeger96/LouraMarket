@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Detalles del Usuario <a  class="btn btn-primary float-end" href="{{ url('users') }}">Volver</a>
                    </h4>
                    <br>
                   <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <label for="">Rol</label>
                            <div class="p-2 border">{{ $users->role_as == '0' ? 'Usuario' : 'Administrador' }}</div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="">Nombre</label>
                            <div class="p-2 border">{{ $users->name }}</div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="">Apellidos</label>
                            <div class="p-2 border">{{ $users->lname }}</div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="">Email</label>
                            <div class="p-2 border">{{ $users->email }}</div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="">Teléfono</label>
                            <div class="p-2 border">{{ $users->phone }}</div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="">Dirección</label>
                            <div class="p-2 border">{{ $users->address }}</div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="">País</label>
                            <div class="p-2 border">{{ $users->country }}</div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="">Provincia/estado</label>
                            <div class="p-2 border">{{ $users->state }}</div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="">Ciudad</label>
                            <div class="p-2 border">{{ $users->city }}</div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="">Código Postal</label>
                            <div class="p-2 border">{{ $users->pincode }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    
@endsection