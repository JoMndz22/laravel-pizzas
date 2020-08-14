<div class="form-row">
	

	<div class="col-12 mb-4">
		<label for="Nombre">{{ 'Nombre' }}</label>
		<input type="text" class="form-control" name="Nombre" id="Nombre" value="{{ isset($sucursal->nombre)? $sucursal->nombre : old('Nombre') }}" />
		</div>

</div>

<div class="form-row">
	<div class="col-12 mb-4">
		<label for="Direccion">{{ 'Direccion' }}</label>
		<input type="text" class="form-control" name="Direccion" id="Direccion" value="{{ isset($sucursal->direccion)? $sucursal->direccion : old('Direccion') }}" />

	</div>
</div>

<div class="form-row">
	<div class="col-12 mb-4">
		<label for="Horario">{{ 'Horario' }}</label>
		<input type="text" class="form-control" name="Horario" id="Horario" value="{{ isset($sucursal->horario)? $sucursal->horario : old('Horario') }}" />

	</div>
</div>

<div class="form-row">
	<div class="col-12 mb-4">
		<label for="Telefonos">{{ 'Telefonos' }}</label>
		<input type="text" class="form-control" name="Telefonos" id="Telefonos" value="{{ isset($sucursal->telefonos)? $sucursal->telefonos : old('Telefonos') }}" />

	</div>
</div>



<div class="form-row">
	<div class="col-md-6 mb-4">
		<input class="btn btn-primary w-100" type="submit" value="{{ $Modo == 'Create' ?'Crear':'Modificar'}}">
	</div>
	<div class="col-md-6 mb-4">
		<a class="btn btn-dark w-100" href="{{ url('sucursales') }}">Regresar</a>
	</div>
</div>