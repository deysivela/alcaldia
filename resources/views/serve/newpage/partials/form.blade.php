<div class="col-md-8 col-sm-8 col-xs-12">
	{{ Form::hidden('user_id', auth()->user()->id) }}
	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12">
		{{ Form::label('titulo',' Titulo de la Noticia') }}
		{{ Form::textarea('titulo',null,['class'=>'form-control','rows'=>'2']) }}
		@if ($errors->has('titulo'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('titulo') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12">
		{{ Form::label('contenido','Contenido') }}
		{{ Form::textarea('contenido',null,['class'=>'form-control','rows'=>'10','maxlength'=>10000]) }}
		@if ($errors->has('contenido'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('contenido') }}</strong>
            </span>
        @endif
		</div>
	</div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12">
			@include('serve.partials.date-input', [
				'name' => 'fecha',
				'label' => 'Fecha de Publicacion',
				'value' => isset($newpage) ? $newpage->fecha : null,
				'labelClass' => '',
				'wrapClass' => '',
			])
		</div>
	</div>
	<br>
	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12">
		{{ Form::label('photo', 'Fotografia para la Noticia') }}
		{{ Form::file('photo', ['class'=>'form-control']) }}
		<small>Formatos Permitidos JPG,PNG MAX 1MB</small><br>
		@if ($errors->has('photo'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('photo') }}</strong>
            </span>
        @endif
		</div>
	</div>
</div>				

<div class="clearfix"></div>
<div class="ln_solid"></div>

<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
		<a href="{{ route('newpages.index') }}" class="btn btn-primary">Cancelar</a>
		{{ Form::submit('Guardar',['class'=>'btn btn-success']) }}
	</div>
</div>
