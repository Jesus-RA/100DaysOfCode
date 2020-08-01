<div class="card border-dark">
    <div class="card-header text-center border-dark">
        <h4>{{$product->title}}</h4>
    </div>

    <div class="card-body">
        <p class="card-text">
            Description: {{$product->description}}
        </p>
        <p><span>Price: </span> {{$product->price}} </p>
        {{-- Comentario en Blade --}}
        {{-- {!!Escapar código HTML !!} --}}
        {{-- Así Blade ignorará ésta instrucción y el framework de JS correspondiente
            lo interpretará @{{ var }} --}}
    </div>
</div>