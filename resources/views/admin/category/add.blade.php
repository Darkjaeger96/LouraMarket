@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Nueva Categoría</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descripción</label>
                        <textarea name="description" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">¿Categoría Visible?</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">¿Popular?</label>
                        <input type="checkbox" name="popular">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Metatítulo</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Palabras clave</label>
                        <textarea class="form-control" rows="3" name="meta_keywords" ></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Metadescripción</label>
                        <textarea class="form-control" rows="3" name="meta_description"></textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection