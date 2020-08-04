@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">                
            <h1>Order Details</h1>
            <div class="table-resposive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cart->products as $product)
                            <tr>
                                <td>
                                    <img src="{{asset($product->images->first()->path)}}" alt="" width="100px">
                                    {{$product->title}}
                                </td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->pivot->quantity}}</td>
                                <td>
                                    <strong>{{$product->pivot->quantity * $product->price}}</strong>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
@endsection