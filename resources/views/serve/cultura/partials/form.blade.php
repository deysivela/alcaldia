<div class="col-md-6 col-sm-6 col-xs-12">
	{{ Form::hidden('user_id', auth()->user()->id) }}
	{{ Form::hidden('categorie', 'CULTURA') }}
	{{ Form::hidden('publish', isset($document) ? $document->publish : 0) }}

	<div class="form-group">
		{{ Form::label('cod','Código', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
			{{ Form::text('cod', null, ['class'=>'form-control','placeholder'=>'Ejemplo CULT-CRON-001/2026']) }}
			<small>Sin puntos (.) ni comas (,). Debe ser único.</small>
			@if ($errors->has('cod'))
				<span class="error" role="alert"><strong>{{ $errors->first('cod') }}</strong></span>
			@endif
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('entity','Título / Actividad', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
			{{ Form::text('entity', null, ['class'=>'form-control','placeholder'=>'Ejemplo Cronograma Virgen de la Asunción 2026']) }}
			@if ($errors->has('entity'))
				<span class="error" role="alert"><strong>{{ $errors->first('entity') }}</strong></span>
			@endif
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4 col-xs-12">Estado</label>
		<div class="col-md-8 col-sm-8 col-xs-12">
			<select class="form-control" name="statu">
				<option value="" hidden>Seleccione el estado</option>
				<option value="Vigente" @if(old('statu', isset($document) ? $document->statu : '') == 'Vigente') selected @endif>Vigente</option>
				<option value="No Vigente" @if(old('statu', isset($document) ? $document->statu : '') == 'No Vigente') selected @endif>No Vigente</option>
			</select>
			@if ($errors->has('statu'))
				<span class="error" role="alert"><strong>{{ $errors->first('statu') }}</strong></span>
			@endif
		</div>
	</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{{ Form::label('description','Descripción', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
			{{ Form::textarea('description', null, ['class'=>'form-control','placeholder'=>'Resumen del cronograma o actividad cultural','rows'=>'6','maxlength'=>1400]) }}
			@if ($errors->has('description'))
				<span class="error" role="alert"><strong>{{ $errors->first('description') }}</strong></span>
			@endif
		</div>
	</div>

	<div class="form-group">
		@include('serve.partials.date-input', [
			'name' => 'date_creation',
			'label' => 'Fecha de publicación',
			'value' => isset($document) ? $document->date_creation : null,
		])
	</div>
</div>

<div class="col-md-4 col-sm-4 col-md-offset-4"><br>
	<div class="form-group">
		{{ Form::label('file', 'Subir archivo (cronograma / actividad)') }}
		{{ Form::file('file', ['accept' => '.pdf,.jpg,.jpeg,.png,image/jpeg,image/png,application/pdf']) }}
		<small>PDF o imagen (JPG, PNG) · máximo 10MB</small><br>
		@if(isset($document) && $document->file)
			<small>Archivo actual: <a href="{{ asset($document->file) }}" target="_blank" rel="noopener">ver</a></small><br>
		@endif
		@if ($errors->has('file'))
			<span class="error" role="alert"><strong>{{ $errors->first('file') }}</strong></span>
		@endif
	</div>
</div>

<div class="clearfix"></div>
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
		<a href="{{ route('cultura.index') }}" class="btn btn-primary">Cancelar</a>
		{{ Form::submit(isset($document) ? 'Actualizar' : 'Guardar', ['class'=>'btn btn-success']) }}
	</div>
</div>
