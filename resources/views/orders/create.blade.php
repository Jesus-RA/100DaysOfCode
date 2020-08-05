@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">                
            <h1>Order Details</h1>
            <h4 class="text-center"> <strong>Grand Total: </strong>{{$cart->total}} </h4>
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
                                    <strong>$ {{$product->total}}</strong>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
@endsection