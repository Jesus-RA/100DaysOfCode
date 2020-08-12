<div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            {{-- Carousel --}}
            {{-- @dump($product) --}}
            <div id="carousel{{$product->id}}" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    @foreach ($product->images as $image)
                        <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                            <img 
                                src="{{ asset($image->path) }}"
                                alt=""
                                class="d-block w-100 card-img-top"
                                height="300"
                            >                
                        </div>
                    @endforeach
                </div>
                <a href="#carousel{{$product->id}}" class="carousel-control-prev" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#carousel{{$product->id}}" class="carousel-control-next" role="button" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            {{-- End Carousel --}}
            <div class="modal-body">
                <h3 class="card-title text-center">{{$product->title}}</h3>
                <p class="card-text">
                    <strong>Description: </strong> {{$product->description}}
                </p>
                <p class="card-text">
                    <strong>Price: </strong> {{$product->price}}
                </p>
                <p class="card-text">
                    <strong>Stock: </strong> {{$product->stock}}
                </p>
                <p class="card-text">
                    <strong>Status: </strong> {{$product->status}}
                </p>
                <button type="button" class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>