@extends('layouts.app')

@section('content')
    <div class="col-md-12 my-2">
        <h1 class="text-center">Your Cart</h1>
    </div>
    @if(!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning text-center">
            Your cart is empty
        </div>
    @else
        <a class="btn btn-success mb-3" href="{{route('orders.create')}}">Start order</a>
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 mb-3">
                    @include('components.product-card')                   
                </div>
            @endforeach
        </div>
    @endif
@endsection