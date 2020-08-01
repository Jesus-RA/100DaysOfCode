@extends('layouts.app')

@section('content')
    <div class="row" style="height:80vh;">
        <div class="d-flex justify-content-center align-self-center w-100">
            <div class="col-md-6">
                @include('components.product-card')
            </div>
        </div>
    </div>
@endsection