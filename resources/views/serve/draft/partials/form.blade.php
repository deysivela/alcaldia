<div class="col-md-6 col-sm-6 col-xs-12">
	{{ Form::hidden('user_id', auth()->user()->id) }}
	<div class="form-group">
		{{ Form::label('name','Nombre del Proyecto', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::text('name',null,['class'=>'form-control']) }}
		@if ($errors->has('name'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('place','Lugar del Proyecto', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::text('place',null,['class'=>'form-control']) }}
		@if ($errors->has('place'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('place') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4 col-xs-12">Tipo del Proyecto</label>
		<div class="col-md-8 col-sm-8 col-xs-12">
			<select name="type" class="form-control">
			<option value="" selected="" hidden="">Seleccione una Opcion</option>	
			<option value="Salud"@if(old('type')=='Salud'){{ 'selected' }}@endif>Salud</option>
			<option value="Educacion"@if(old('type')=='Educacion'){{ 'selected' }}@endif>Educacion</option>
			<option value="Deporte"@if(old('type')=='Deporte'){{ 'selected' }}@endif>Deporte</option>
			<option value="Cultura"@if(old('type')=='Cultura'){{ 'selected' }}@endif>Cultura</option>
		</select>
		@if ($errors->has('type'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
		</div>
	</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{{ Form::label('photo', 'Fotografia',['class'=>'control-label col-md-4 col-sm-4']) }}
		{{ Form::file('photo', null,['class'=>'form-control']) }}
		<small>Formatos Permitidos JPG,PNG MAX 1MB</small><br>
		@if ($errors->has('photo'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('photo') }}</strong>
            </span>
        @endif
	</div>
</div>				

<div class="clearfix"></div>
<div class="ln_solid"></div>

<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
		<a href="{{ route('projects.index') }}" class="btn btn-primary">Cancelar</a>
		{{ Form::submit('Guardar',['class'=>'btn btn-success']) }}
	</div>
</div>