@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2 style="font-size: 18px;">Edicion de Documento Importantes<small></small></h2>
		  	@include('serve.alerts.alerts')
		    <ul class="nav navbar-right panel_toolbox">
		      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		      </li>
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
		        <ul class="dropdown-menu" role="menu">
		          <li><a href="#">Settings 1</a>
		          </li>
		          <li><a href="#">Settings 2</a>
		          </li>
		        </ul>
		      </li>
		      <li><a class="close-link"><i class="fa fa-close"></i></a>
		      </li>
		    </ul>
		    <div class="clearfix"></div>
		  </div>
		  <div class="x_content form-horizontal form-label-left">
		  	<br/>
			{!! Form::model($document, ['route'=>['important.update', $document->id], 'method'=>'PUT','files'=>true])!!}
			<div class="col-md-6 col-sm-6 col-xs-12">

{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
    <label class="control-label col-md-4 col-sm-4 col-xs-12">Categoria</label>
    <div class="col-md-8 col-sm-8 col-xs-12">
      <select class="form-control" name="categorie">
        <option value="{{ $document->categorie }}">{{ $document->categorie }}</option>
        <option value="RESOLUCIONES MUNICIPALES" disabled="">RESOLUCIONES MUNICIPALES</option>
        <option value="RESOLUCIONES MUNICIPALES ADMINISTRATIVOS" disabled="">RESOLUCIONES MUNICIPALES ADMINISTRATIVOS</option>
        <option value="DECRETOS EDILES" disabled="">DECRETOS EDILES</option>
        <option value="INFORMES DE TRANSPARENCIA" disabled="">INFORMES DE TRANSPARENCIA</option>
        <option value="INFORMES DE AUDITORIA" disabled="">INFORMES DE AUDITORIA</option>
        <option value="INFORMES DE GESTION" disabled="">INFORMES DE GESTION</option>
      </select>
       @if ($errors->has('categorie'))
        <span class="error" role="alert">
            <strong>{{ $errors->first('categorie') }}</strong>
        </span>
    @endif
    </div>
</div>


<div class="form-group">
    {{ Form::label('name_document','Nombre del Documento', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
    <div class="col-md-8 col-sm-8 col-xs-12">
    {{ Form::text('name_document',null,['class'=>'form-control']) }}
    @if ($errors->has('name_document'))
        <span class="error" role="alert">
            <strong>{{ $errors->first('name_document') }}</strong>
        </span>
    @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('data_document','Datos del Documento', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
    <div class="col-md-8 col-sm-8 col-xs-12">
    {{ Form::text('data_document',null,['class'=>'form-control']) }}
    @if ($errors->has('data_document'))
        <span class="error" role="alert">
            <strong>{{ $errors->first('data_document') }}</strong>
        </span>
    @endif
    </div>
</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        @include('serve.partials.date-input', [
            'name' => 'date_creation',
            'label' => 'Fecha de Publicacion',
            'value' => $document->date_creation ?? null,
        ])
    </div>
    <br>
    <div class="form-group">
        {{ Form::label('file', 'Subir Archivo',['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
        {{ Form::file('file') }}
        <small>Formatos Permitido Unicamente PDF MAXIMO 60MB</small><br>
        @if ($errors->has('file'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group" hidden="">
        <label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name="publish" value="0" class="form-control">
        </div>
    </div>
</div>              

<div class="clearfix"></div>
<div class="ln_solid"></div>

<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
        <a href="{{ route('important.index') }}" class="btn btn-primary">Cancelar</a>
        {{ Form::submit('Guardar',['class'=>'btn btn-success']) }}
    </div>
</div>

			{!! Form::close() !!}
		  </div>
		</div>
	</div>
</div>
@endsection