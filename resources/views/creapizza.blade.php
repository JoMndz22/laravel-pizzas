@extends('layout.main')



@section('body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <img src="/images/PIZZA-COVER-JPEG.jpg" class="img-fluid w-100" alt="Pizza">
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
                        <p class="lead w-100 w-lg-50 text-white text-center">Diviértete creando tu pizza perfecta, elige los ingredientes que más te gustan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 dv-ingredientes">
        <form>
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">¿Qué salsa deseas?</h2>
                    <hr class="mb-5">
                </div>

            
                <div class="col-md-4">
                    <div class="form-check mb-4 mb-sm-5">
                        <input class="form-check-input" type="radio" name="radioSalsa" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Salsa de Tomate
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check mb-4 mb-sm-5">
                        <input class="form-check-input" type="radio" name="radioSalsa" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Crema Fresca
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check mb-4 mb-sm-5">
                        <input class="form-check-input" type="radio" name="radioSalsa" id="exampleRadios3" value="option2">
                        <label class="form-check-label" for="exampleRadios3">
                            Crema BBQ
                        </label>
                    </div>
                </div>

                <div class="col-12">
                    <h2 class="text-center mt-5">¿Qué ingredientes deseas?</h2>
                    <hr class="mb-5">
                </div>

                @foreach($ingredientes as $ing)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card border-0 text-center mb-4">
                          <img src="{{ asset('storage').'/'.$ing->imagen }}" class="img-fluid d-block mx-auto" alt="{{ $ing->nombre }}">
                          <div class="card-body">
                            <h5 class="card-title mb-0">{{ $ing->nombre }}</h5>
                            <p><b>$ {{ $ing->precio }}</b></p>
                            <a href="#" class="btn bg-red-pizza text-white">Agregar</a>
                          </div>
                        </div>
                    </div>
                @endforeach
                

            </div>
        </form>
        <img src="/images/pizza-en-blanco-y-negro.png" class="img-back">
    </div>


@endsection