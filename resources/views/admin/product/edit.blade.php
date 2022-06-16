@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Editando Producto: {{ $products->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Categoría</label>
                        <select class="form-select">
                            <option value="">{{$products->category->name}}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ $products->name }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $products->slug }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descripción Corta</label>
                        <textarea name="small_description" rows="3" class="form-control" required>{{ $products->small_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descripción</label>
                        <textarea name="description" rows="3" class="form-control" required>{{ $products->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Precio Original (€)</label>
                        <input type="number" class="form-control" min="0" name="original_price" value="{{ $products->original_price }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Precio de Venta (€)</label>
                        <input type="number" class="form-control"  min="0"  name="selling_price"  value="{{ $products->selling_price }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Impuesto</label>
                        <input type="number" class="form-control" name="tax" min="0" max="100" value="{{ $products->tax }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Cantidad</label>
                        <input type="number" class="form-control" name="quantity" min="0" value="{{ $products->quantity }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">¿Producto Visible?</label>
                        <input type="checkbox" name="status" {{ $products->status == "0" ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">¿tendencia?</label>
                        <input type="checkbox" name="trending" {{ $products->trending == "1" ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Metatítulo</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $products->meta_title }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Palabras Clave</label>
                        <textarea class="form-control" rows="3" name="meta_keywords">{{ $products->meta_keywords }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Metadescripción</label>
                        <textarea class="form-control" rows="3" name="meta_description">{{ $products->meta_description }}</textarea>
                    </div>
                    @if ($products->image)
                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection