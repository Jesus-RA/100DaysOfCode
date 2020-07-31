@extends('layouts.app')

@section('content')
    <div class="row justify-content-center text-center">
        <div class="col-md-4">
            <h1>Create a product</h1>
            {{-- 
                @if (session()->has('error'))
                    <div class="alert alert-danger text-center">
                        {{session()->get('error')}}
                    </div>
                @endif
                Ya no es necesario pues ya estamos manejando el error con la variable $errors
            --}}
            <form action="{{route('products.store')}}" method="POST">
                @csrf
                <div class="form-row mb-2">
                    <input type="text" name="title" id="title" placeholder="Title" value="{{old('title')}}" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-row mb-2">
                    {{-- <input type="text" name="description"  id="description" placeholder="Description" value="{{old('description')}}" class="form-control" required> --}}
                    <textarea name="description" id="description" placeholder="Description" class="form-control" required>{{old('description')}}</textarea>
                </div>
                <div class="form-row mb-2">
                    <input type="number" name="price" id="price" placeholder="Price" value="{{old('price')}}" min="1.00" step="0.01" class="form-control" required>
                </div>
                <div class="form-row mb-2">
                    <input type="number" name="stock" id="stock" placeholder="Stock" value="{{old('stock')}}" min="0" class="form-control" required>
                </div>
                <div class="form-row mb-2">
                    <select name="status" id="status" class="custom-select" required>
                        <option value="" selected>Status...</option>
                        <option value="available" {{old('status') == 'available' ? 'selected' : ''}}>Available</option>
                        <option value="unavailable" {{old('status') == 'unavailable' ? 'selected' : ''}}>Unavailable</option>
                    </select>
                </div>

                <div class="form-row">
                    <button type="submit" class="btn btn-primary btn-block">Create Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection