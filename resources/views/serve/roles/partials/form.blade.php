
<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12">
		{{ Form::label('name','Nombre') }}
		{{ Form::text('name',null,['class'=>'form-control','id'=>'name', 'required' => 'required']) }}
		</div>
	</div>
	<div class="form-group" hidden="">
		<div class="col-md-12 col-sm-12 col-xs-12">
		{{ Form::label('slug','URL Amigable') }}
		{{ Form::text('slug',null,['class'=>'form-control','id'=>'slug']) }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12">
		{{ Form::label('description','Descripcion') }}
		{{ Form::textarea('description',null,['class'=>'form-control']) }}
		</div>
	</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
	<h3>Permisos Especiales</h3>
	<div class="form-group">
		<label>
			<input type="radio" name="special" value="all-access"
				{{ isset($role) && $role->special === 'all-access' ? 'checked' : '' }}>
			Acceso Total
		</label>
		<label>
			<input type="radio" name="special" value="no-access"
				{{ isset($role) && $role->special === 'no-access' ? 'checked' : '' }}>
			Ningun Acceso
		</label>
	</div>
	<hr>
	<h3>Lista de Permisos</h3>
	<div class="form-group">
		<ul class="list-unstyled">
			@foreach($permissions as $permission)
			<li>
				<label>
					<input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
						{{ isset($role) && $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
					{{ $permission->name }}
					<em style="font-size: 11px;">({{ $permission->description ?: 'Sin Descripcion' }})</em>
				</label>
			</li>
			@endforeach
		</ul>
	</div>
</div>

<div class="clearfix"></div>
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
		<a href="{{ route('roles.index') }}" class="btn btn-primary">Cancelar</a>
		{{ Form::submit('Guardar',['class'=>'btn btn-success']) }}
	</div>
</div>
