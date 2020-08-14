@extends('layout.main')
@section('body')

	<p class="text-center text-uppercase mt-3 d-table mx-auto text-green font-weight-bold">
		@if(Session::has('mensaje')){{
			Session::get('mensaje')
		}}
		@endif
	</p>
	
	<div class="container">
		<div class="row">
			<div class="col-12 py-5">

				<a href="{{ url('ingredientes/create') }}">Agregar Ingrediente</a>
				<table class="table table-light">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Precio</th>
							<th>Imagen</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($ingredientes as $ing)
							<tr>
								<td> {{ $loop->iteration }} </td>
								<td> {{ $ing->nombre }} </td>
								<td> {{ $ing->precio }} </td>
								<td> <img src="{{ asset('storage').'/'.$ing->imagen }}" alt="" width="200" /> </td>
								<td> 
									<a href="{{ url('/ingredientes/'.$ing->id.'/edit') }}"> Editar </a> 
									|
									<form method="post" action="{{ url( '/ingredientes/'.$ing->id ) }}">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" onclick="return confirm('Borrar?');">Borrar</button>
									</form>

								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection