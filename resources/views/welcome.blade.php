@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 my-5">
            <h1 class="text-center">Products</h1>
        </div>
        @empty($products)
            <div class="alert alert-danger text-center">
                No products yet!    
            </div>
        @else
            @foreach ($products as $product)
                <div class="col-md-3 mb-3">
                    @include('components.product-card')                    
                </div>
            @endforeach
        @endempty
    </div>
@endsection