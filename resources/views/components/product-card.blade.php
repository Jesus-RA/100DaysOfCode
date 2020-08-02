<div class="card border-dark">
    <div class="card-header text-center border-dark">
        <h4>{{$product->title}}</h4>
    </div>

    <div class="card-body">
        <p  id="test">
            Description: {{$product->description}}
        </p>
        <p><span>Price: </span> {{$product->price}} </p>
        <p>
            <span>Stock:</span> {{$product->stock}}
        </p>
        <p>
            <span>Status:</span> {{$product->status}}
        </p>
        {{-- Comentario en Blade --}}
        {{-- {!!Escapar código HTML !!} --}}
        {{-- Así Blade ignorará ésta instrucción y el framework de JS correspondiente
            lo interpretará @{{ var }} --}}
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