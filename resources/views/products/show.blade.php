@extends('layouts.app')

@section('content')
    <div class="row justify-content-center my-auto">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>{{$product->title}}</h4>
                </div>
    
                <div class="card-body">
                    
                    <p>
                        Description: {{$product->description}}
                    </p>
                    <p><span>Price: </span> {{$product->price}} </p>
                    {{-- Comentario en Blade --}}
                    {{-- {!!Escapar código HTML !!} --}}
                    {{-- Así Blade ignorará ésta instrucción y el framework de JS correspondiente
                        lo interpretará @{{ var }} --}}
                </div>
            </div>
            <a href="{{route('products.index')}}" class="btn btn-primary btn-block">...back list products</a>
        </div>
    </div>
@endsection