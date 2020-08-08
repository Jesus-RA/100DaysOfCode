@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4">
            
            @foreach ($product->images as $image)
                <h3>{{$image}}</h3>
            @endforeach
            {{-- {{dd($product)}} --}}
            @include('components.product-card')
        </div>
    </div>
@endsection