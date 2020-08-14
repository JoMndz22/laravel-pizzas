
<div class="form-row">
	<div class="col-12 mb-4">
		<label for="Nombre">{{ 'Nombre' }}</label>

		<input type="text" class="form-control {{ $errors->has('Nombre')? 'is-invalid' :'' }}" 
			name="Nombre" id="Nombre" 
			value="{{ isset($pizza->nombre)? $pizza->nombre : old('Nombre') }}" />

		{!! $errors->first('Nombre', '<div class="invalid-feedback"> :message </div>' ) !!}
		
		
	</div>
</div>

<div class="form-row">
	<div class="col-12 mb-4">
		<label for="Precio">{{ 'Precio' }}</label>
		<input class="form-control {{ $errors->has('Precio')? 'is-invalid' :'' }}" 
			type="text" name="Precio" id="Precio" 
			value="{{ isset($pizza->precio) ? $pizza->precio : old('Precio') }}" />

		{!! $errors->first('Precio', '<div class="invalid-feedback">:message</div>' ) !!}
			
	</div>
</div>

<div class="form-row">
	<div class="col-12 mb-4">
		<label for="Descripcion">{{ 'Descripcion' }}</label>
		<textarea class="form-control {{ $errors->has('Descripcion')? 'is-invalid' :'' }}" 
			name="Descripcion" id="Descripcion">{{  isset($pizza->descripcion) ? $pizza->descripcion : old('Descripcion') }} </textarea>
		{!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>' ) !!}
		
	</div>
</div>

<div class="form-row">
	<div class="col-12 mb-4">
		<label for="Imagen">{{ 'Imagen' }}</label>
		@if(isset($pizza->imagen))
			<img src="{{ asset('storage').'/'.$pizza->imagen }}" alt="" width="200" />
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
		<a class="btn btn-dark w-100" href="{{ url('pizzas') }}">Regresar</a>
	</div>
</div>