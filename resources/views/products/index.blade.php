@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">                
            {{-- 
                @if (session('deleted'))
                    <div class="alert alert-success text-center">
                        {{session('deleted')}}
                    </div>
                @endif
                @if (session('updated'))
                    <div class="alert alert-success text-center">
                        {{session('updated')}}
                    </div>
                @endif 
                Éstos elementos ya no son necesarios ya que en todos los metodos se está creando 
                la session success con su respectivo mensaje.
            --}}
            {{-- @if (session()->has('success'))
                <div class="alert alert-success text-center">
                    {{session()->get('success')}}
                </div>
            @endif --}}

            @empty ($products){{-- @if (empty($products)) --}}
                <div class="alert alert-warning text-center">
                    The list of products is empty.
                </div>
            @else
                <h1>List of products</h1>
                <a href="{{route('products.create')}}" class="btn btn-primary mb-3">Create</a>
                <div class="table-resposive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->status}}</td>
                                    <td>
                                        <a href="{{route('products.show', $product->id)}}" class="btn btn-info">Show</a>
                                        <a href="{{route('products.edit', $product)}}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('products.destroy', $product)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endempty {{-- @endif--}}
        </div>
    </div>    
@endsection