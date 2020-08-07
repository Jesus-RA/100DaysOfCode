<div class="card">
    
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

    <div class="card-body">
        <h4 class="text-right"><strong>${{$product->price}}</strong></h4>
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text" id="test">
            {{$product->description}}
        </p>
        <p class="card-text"> <strong> {{$product->stock}} left</strong> </p>
        @if (isset($cart))        
            <p class="card-text text-center">
                {{$product->pivot->quantity}} in your cart <strong>($ {{$product->total}})</strong>
            </p>
        @endif
        {{-- Comentario en Blade --}}
        {{-- {!!Escapar código HTML !!} --}}
        {{-- Así Blade ignorará ésta instrucción y el framework de JS correspondiente
            lo interpretará @{{ var }} --}}
    </div>
    
    <div class="card-footer">
        @if (isset($cart))
            <form 
                action="{{route('products.carts.destroy', compact('product', 'cart'))}}" 
                method="POST" 
                class="d-inline"
            >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-block">Remove from cart</button>
            </form>
        @else
            <form 
                action="{{route('products.carts.store', $product)}}" 
                method="POST" 
                class="d-inline"
            >
                @csrf
                <button type="submit" class="btn btn-success btn-block">Add to cart</button>
            </form>            
        @endif
    </div>
</div>

<style>
    #test{
        width: 100%;
        overflow: hidden;
        
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;  
    }
</style>