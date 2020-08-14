@extends('layout.main')
@section('body')
	
	<div class="container">
		<div class="row">
			<div class="col-12 py-5">
				@if(count($errors) > 0 )
					<div class="alert alert-danger " role="alert">
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				
				<form action="{{ url('/pizzas') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					
					@include('pizzas.form',['Modo'=>'Create'])
				</form>
			</div>
		</div>
	</div>

@endsection