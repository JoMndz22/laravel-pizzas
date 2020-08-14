@extends('layout.main')



@section('body')
    
    
    <div class="container-fluid bg-red-pizza">
        <div class="container">
            <div class="row">                
                <div class="col-12 py-5 p-0">
                    <div class=" jumbotron bg-transparent rounded-0 border-0 mb-0">
                        <h1 class="text-white text-uppercase">Sucursales</h1>
                        <hr>
                        <p class="text-white">Encuentra el lugar ideal. Puedes ver los horarios de atención y dirección.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            @foreach($sucursales as $suc)
                <div class="col-sm-6 col-md-4">
                    <div class="card bg-light mb-4">
                        <div class="card-body">
                            <h5 class="card-title text-green">{{$suc->nombre}}</h5>
                            <hr>
                            <p class="card-text">{{ $suc->direccion }}</p>
                            <p class="card-text"><b>Tel:</b> {{ $suc->telefonos }}</p>
                            <p class="card-text"><b>Horario: </b>{{ $suc->horario }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    


@endsection