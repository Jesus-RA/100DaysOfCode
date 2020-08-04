@extends('layouts.app')

@section('content')
    <div class="col-md-12 mb-4">
        <h1 class="text-center">Products</h1>
    </div>
    @empty($products)
        <div class="alert alert-danger text-center">
            No products yet!    
        </div>
    @else
        <div class="row">
            @foreach ($products as $product)
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 mb-3">
                        @include('components.product-card')                   
                    </div>
            @endforeach
        </div>
    @endempty
@endsection