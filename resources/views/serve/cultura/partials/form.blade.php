<div class="col-md-8 col-sm-8 col-xs-12">
	{{ Form::hidden('user_id', auth()->user()->id) }}
	{{ Form::hidden('categorie', 'CULTURA') }}
	{{ Form::hidden('publish', isset($document) ? $document->publish : 0) }}

	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12">
			{{ Form::label('entity', 'Título') }}
			{{ Form::textarea('entity', null, ['class'=>'form-control','rows'=>'2','placeholder'=>'Ejemplo Cronograma Virgen de la Asunción 2026']) }}
			@if ($errors->has('entity'))
				<span class="error" role="alert"><strong>{{ $errors->first('entity') }}</strong></span>
			@endif
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12">
			{{ Form::label('description', 'Descripción') }}
			{{ Form::textarea('description', null, ['class'=>'form-control','rows'=>'10','placeholder'=>'Resumen del cronograma o actividad cultural','maxlength'=>1400]) }}
			@if ($errors->has('description'))
				<span class="error" role="alert"><strong>{{ $errors->first('description') }}</strong></span>
			@endif
		</div>
	</div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12">
			@include('serve.partials.date-input', [
				'name' => 'date_creation',
				'label' => 'Fecha de publicación',
				'value' => isset($document) ? $document->date_creation : null,
				'labelClass' => '',
				'wrapClass' => '',
			])
		</div>
	</div>
	<br>
	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12">
			{{ Form::label('file', 'Subir archivo (cronograma / actividad)') }}
			{{ Form::file('file', ['class'=>'form-control','accept' => '.pdf,.jpg,.jpeg,.png,image/jpeg,image/png,application/pdf']) }}
			<small>PDF o imagen (JPG, PNG) · máximo 5MB</small><br>
			@if(isset($document) && $document->file)
				<small>Archivo actual: <a href="{{ asset($document->file) }}" target="_blank" rel="noopener">ver</a></small><br>
			@endif
			@if ($errors->has('file'))
				<span class="error" role="alert"><strong>{{ $errors->first('file') }}</strong></span>
			@endif
		</div>
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
