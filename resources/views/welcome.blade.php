@extends('layout.main')



@section('body')

    

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <img src="/images/cover-pizza.png" class="img-fluid w-100" alt="Pizza Deluxe">
            </div>
        </div>
    </div>
    

    <div class="container-fluid bg-red-pizza">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="jumbotron bg-red-pizza mb-0">
                        <h1 class="display-4 text-uppercase text-white text-center">¡Crea tu pizza a tu gusto!</h1>
                        <hr>
                        <a href="/crea-tu-pizza" class="btn bg-green text-white btn-lg d-table mx-auto px-lg-5">AQUÍ</a>   
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2>Las Mejores</h2>
                <hr class="mb-5">
            </div>
            @if(!isset($pizzas))
                <h2>No hay pizzas disponibles</h2>
            @endif
            @foreach($pizzas as $pizza)
                <div class="col-md-4">
                    <div class="card bg-light mb-4">
                        <img src="{{ asset('storage').'/'.$pizza->imagen }}" alt="{{ $pizza->nombre }} " class="img-fluid w-100">

                        <div class="card-body">
                            <h5 class="card-title text-green mb-0 text-uppercase">{{ $pizza->nombre }}</h5>
                            <p><b>{{ $pizza->precio }}</b></p>
                            <a data-fancybox="{{ 'pizza-'.$pizza->id }}" data-src="#{{ 'pizza-'.$pizza->id }}" href="javascript:;" class="text-green">Leer más »</a>

                            <a class="btn btn-primary" 
                                @auth
                                    data-fancybox="{{ 'pizza-'.$pizza->id.'-home' }}" 
                                    data-src="#{{ 'pizza-'.$pizza->id.'-home' }}" href="javascript:;" 
                                    href=" /compra/{{$pizza->id}}"
                                @else
                                    href=" /login"
                                @endauth
                            >
                            Comprar </a> 
                        </div>
                    </div>
                    <div class="box" id="{{ 'pizza-'.$pizza->id.'-home' }}" style="display:none;">
                        <div>                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{ asset('storage').'/'.$pizza->imagen }}" alt="{{ $pizza->nombre }} " class="img-fluid d-block mx-auto mb-3">
                                    <h2 class="text-green">{{ $pizza->nombre }}</h2>
                                    <hr />
                                    <p>{{ $pizza->descripcion }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b>Precio: </b> ${{ $pizza->precio }}</p>
                                    <p><b>Ingredientes:</b></p>
                                    @php
                                        $pizzaValor = 0;
                                    @endphp
                                    @foreach($ingredientes as $ingrediente)
                                        @foreach($detalle as $pivot)
                                            @if($pivot->pizza_id ==$pizza->id && 
                                                $pivot->ingredientes_id == $ingrediente->id)
                                                    <p>{{ $ingrediente->nombre }} - ${{ $ingrediente->precio }}</p>
                                                @php
                                                    $pizzaValor += $ingrediente->precio
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endforeach
                                    <p><b>Total a pagar: {{ $pizzaValor + $pizza->precio}}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box" id="{{ 'pizza-'.$pizza->id }}" style="display:none;">
                        <div>
                            <img src="{{ asset('storage').'/'.$pizza->imagen }}" alt="{{ $pizza->nombre }} " class="img-fluid d-block mx-auto mb-3">
                            <h2 class="text-green">{{ $pizza->nombre }}</h2>
                            <hr />
                            <p>{{ $pizza->descripcion }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>


@endsection