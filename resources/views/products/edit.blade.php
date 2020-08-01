@extends('layouts.app')

@section('content')
    <div class="row justify-content-center text-center">
        <div class="col-md-4">
            <h1>Edit product {{$product->title}}</h1>
            <form action="{{route('products.update', $product)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row mb-2">
                    <input type="text" name="title" id="title" value="{{ old('title') ?? $product->title}}" class="form-control" required>
                </div>
                <div class="form-row mb-2">
                    {{-- <input type="text" name="description"  id="description" value="{{ old('description') ?? $product->description}}" class="form-control" required> --}}
                    <textarea name="description" id="description" placeholder="Description" class="form-control">{{old('description') ?? $product->description}}</textarea>
                </div>
                <div class="form-row mb-2">
                    <input type="number" name="price" id="price" value="{{ old('price') ?? $product->price}}" min="1.00" step="0.01" class="form-control" required>
                </div>
                <div class="form-row mb-2">
                    <input type="number" name="stock" id="stock" value="{{ old('stock') ?? $product->stock}}" min="0" class="form-control" required>
                </div>
                <div class="form-row mb-2">
                    <select name="status" id="status" class="custom-select" required>
                        <option value="available" {{ old('status') == 'available' ? 'selected' : ($product->status === 'available' ? 'selected' : '')}}>Available</option>
                        <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : ($product->status === 'unavailable' ? 'selected' : '')}}>Unavailable</option>
                    </select>
                </div>

                <div class="form-row mt-2">
                    <button type="submit" class="btn btn-warning btn-block">Update Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection