@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Admin Panel</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{route('products.index')}}" class="list-group-item bg-success">
                            Manage Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
