@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Nuevo Producto</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Categoría</label>
                        <select class="form-select" name="category_id" required>
                            <option value="">Selecciona una categoría</option>
                            @foreach ($category as $item)   
                                <option value="{{ $item->id }}">{{ $item->name }}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descripción Corta</label>
                        <textarea name="small_description" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descripción</label>
                        <textarea name="description" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Precio Original (€)</label>
                        <input type="number" class="form-control" min="0" name="original_price" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Precio de Venta (€)</label>
                        <input type="number" class="form-control" min="0" name="selling_price" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Impuesto</label>
                        <input type="number" class="form-control" min="0" max="100" name="tax" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Cantidad</label>
                        <input type="number" class="form-control" min="0" name="quantity" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">¿Producto Visible?</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">¿tendencia?</label>
                        <input type="checkbox" name="trending">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Metatítulo</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Palabras Clave</label>
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