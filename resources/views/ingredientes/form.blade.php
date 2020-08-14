<div class="form-row">
	

	<div class="col-12 mb-4">
		<label for="Nombre">{{ 'Nombre' }}</label>
		<input type="text" class="form-control" name="Nombre" id="Nombre" value="{{ isset($ingrediente->nombre)? $ingrediente->nombre : old('Nombre') }}" />
		</div>

</div>

<div class="form-row">
	<div class="col-12 mb-4">
		<label for="Precio">{{ 'Precio' }}</label>
		<input type="text" class="form-control" name="Precio" id="Precio" value="{{ isset($ingrediente->precio)? $ingrediente->precio : old('Precio') }}" />

	</div>
</div>

<div class="form-row">
	<div class="col-12 mb-4">
		<label for="Imagen">{{ 'Imagen' }}</label>
		@if(isset($ingrediente->imagen))
			<img src="{{ asset('storage').'/'.$ingrediente->imagen }}" alt="" width="200" />
		@endif
		<input type="file" class="form-control {{ $errors->has('Imagen')? 'is-invalid' :'' }}" name="Imagen" id="Imagen" value="" />
		{!! $errors->first('Imagen', '<div class="invalid-feedback">:message</div>' ) !!}
		
	</div>
</div>


<div class="form-row">
	<div class="col-md-6 mb-4">
		<input class="btn btn-primary w-100" type="submit" value="{{ $Modo == 'Create' ?'Crear':'Modificar'}}">
	</div>
	<div class="col-md-6 mb-4">
		<a class="btn btn-dark w-100" href="{{ url('ingredientes') }}">Regresar</a>
	</div>
</div>