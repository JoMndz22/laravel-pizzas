@extends('layout.main')
@section('body')
	
	<div class="container">
		<div class="row">
			<div class="col-12 py-5">

				<form action="{{ url('/pizzas/'.$pizza->id) }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PATCH') }} 

					@include('pizzas.form',['Modo'=>'Edit'])

					
				</form>	
			</div>
		</div>
	</div>

@endsection