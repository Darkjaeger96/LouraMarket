@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Editando Categoría: {{$category->name}}</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nombre</label>
                        <input type="text" value="{{$category->name}}" class="form-control" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{$category->slug}}" class="form-control" name="slug" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descripción</label>
                        <textarea name="description" rows="3" class="form-control" required>{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">¿Categoría Visible?</label>
                        <input type="checkbox" {{$category->status == "0" ? 'checked':''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">¿Popular?</label>
                        <input type="checkbox" {{$category->popular == "1" ? 'checked':''}} name="popular">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Metatítulo</label>
                        <input type="text" value="{{$category->meta_title}}" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Palabras clave</label>
                        <textarea class="form-control" rows="3" name="meta_keywords">{{$category->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Metadescripción</label>
                        <textarea class="form-control" rows="3" name="meta_description">{{$category->meta_description}}</textarea>
                    </div>
                    @if ($category->image)
                        <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="Image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection