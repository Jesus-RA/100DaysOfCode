@extends('layouts.empty')

@section('content')
    <div class="row mt-5">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 mx-auto my-auto">
            <div class="card border border-dark py-5 px-5">
                <h1 class="text-center">Get in touch</h1>
                <form action="{{route('contacts.store')}}" method="POST">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-6 mt-5 mb-3">
                                <input type="text" name="name" placeholder="Name" class="form-control" autocomplete="off" required>
                            </div>
                
                            <div class="col-6 mt-5 mb-3">
                                <input type="text" name="email" placeholder="e-mail" class="form-control" autocomplete="off" required>
                            </div>
                
                            <div class="col-12 mb-3">
                                <textarea name="message" id="message" rows="5" class="form-control" placeholder="Leave a message" autocomplete="off" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark btn-block">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>        
        </div>
    </div>
@endsection