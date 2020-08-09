@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto text-center mt-5">
                <h1 class="mb-3">Upload an image</h1>
                <form
                    action="{{route('images.store')}}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <input type="file" name="image">
                    <button type="submit" class="btn btn-dark">Upload</button>
                </form>
                @if (session('success'))
                    <h4 class="mt-3">You uploaded this image</h4>
                    <div class="card">
                        <img src="{{ Storage::url(session('success')) }}" alt="" class="card-img-top">
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection