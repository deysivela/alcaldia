@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2 style="font-size: 18px;">Edicion de Documento<small></small></h2>
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
			{!! Form::model($document, ['route'=>['doc.update', $document->id], 'method'=>'PUT','files'=>true])!!}

			<div class="col-md-6 col-sm-6 col-xs-12">

	        {{ Form::hidden('user_id', auth()->user()->id) }}

	        {{-- <div class="form-group">
	            {{ Form::label('categorie_id','Categoria', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
	            <div class="col-md-8 col-sm-8 col-xs-12">
	            {{ Form::select('categorie_id',$categorias, null,['class'=>'form-control','placeholder'=>'Eliga una categoria']) }}
	            @if ($errors->has('categorie_id'))
	                <span class="error" role="alert">
	                    <strong>{{ $errors->first('categorie_id') }}</strong>
	                </span>
	            @endif
	            </div>
	        </div> --}}

	        <div class="form-group">
	            <label class="control-label col-md-4 col-sm-4 col-xs-12">Categoria</label>
	            <div class="col-md-8 col-sm-8 col-xs-12">
	              <select class="form-control" name="categorie">
	              	<option value="{{ $document->categorie }}" hidden="">{{ $document->categorie }}</option>
	              	<option value="IMPORTANTES" disabled="">IMPORTANTES</option>
	                <option value="LEYES MUNICIPALES">LEYES MUNICIPALES</option>
	                <option value="RESOLUCIONES MUNICIPALES">RESOLUCIONES MUNICIPALES</option>
	                <option value="RESOLUCIONES MUNICIPALES ADMINISTRATIVOS">RESOLUCIONES MUNICIPALES ADMINISTRATIVOS</option>
	                <option value="DECRETOS EDILES">DECRETOS EDILES</option>
	                <option value="INFORMES DE TRANSPARENCIA">INFORMES DE TRANSPARENCIA</option>
	                <option value="INFORMES DE AUDITORIA">INFORMES DE AUDITORIA</option>
	                <option value="INFORMES DE GESTION">INFORMES DE GESTION</option>
	                <option value="ZOONOSIS">ZOONOSIS</option>
	                <option value="CULTURA">CULTURA</option>
  	              </select>
	              @if ($errors->has('categorie'))
	                <span class="error" role="alert">
	                    <strong>{{ $errors->first('categorie') }}</strong>
	                </span>
	            @endif
	            </div>
	        </div>

	        <div class="form-group">
	            {{ Form::label('cod','Codigo', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
	            <div class="col-md-8 col-sm-8 col-xs-12">
	            {{ Form::text('cod',null,['class'=>'form-control','placeholder'=>'Ejemplo INF. AUDINT N° 003/2017, Nº 92/2016']) }}
	            @if ($errors->has('cod'))
	                <span class="error" role="alert">
	                    <strong>{{ $errors->first('cod') }}</strong>
	                </span>
	            @endif
	            </div>
	        </div>

	        <div class="form-group">
	            {{ Form::label('entity','Entidad', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
	            <div class="col-md-8 col-sm-8 col-xs-12">
	            {{ Form::text('entity',null,['class'=>'form-control','placeholder'=>'Ejemplo Gobierno Autonomo Municipal de llallagua, Hospital Madre Obrera']) }}
	            @if ($errors->has('entity')) 
	                <span class="error" role="alert">
	                    <strong>{{ $errors->first('entity') }}</strong>
	                </span>
	            @endif
	            </div>
	        </div>
	        <div class="form-group">
	            <label class="control-label col-md-4 col-sm-4 col-xs-12">Estado del Documento</label>
	            <div class="col-md-8 col-sm-8 col-xs-12">
	              <select class="form-control" name="statu">
	              	<option value="{{ $document->statu }}" hidden="">{{ $document->statu }}</option>
	                <option value="Vigente">Vigente</option>
	                <option value="No Vigente">No Vigente</option>
	              </select>
	              @if ($errors->has('statu')) 
	                <span class="error" role="alert">
	                    <strong>{{ $errors->first('statu') }}</strong>
	                </span>
	            @endif
	            </div>
	        </div>
	        </div>

	        <div class="col-md-6 col-sm-6 col-xs-12">
	            <div class="form-group">
	                {{ Form::label('description','Descripcion', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
	                <div class="col-md-8 col-sm-8 col-xs-12">
	                {{ Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Ingrese Contenido Resaltante del Documento a Publicar','rows'=>'6','maxlength'=>1400]) }}
	                @if ($errors->has('description'))
	                    <span class="error" role="alert">
	                        <strong>{{ $errors->first('description') }}</strong>
	                    </span>
	                @endif
	                </div>
	            </div>

	            <div class="form-group">
	                @include('serve.partials.date-input', [
	                    'name' => 'date_creation',
	                    'label' => 'Fecha de Publicacion',
	                    'value' => $document->date_creation ?? null,
	                ])
	            </div>
	        </div>              

	        <div class="col-md-4 col-sm-4 col-md-offset-4"><br>
	            <div class="form-group">
	                {{ Form::label('file', 'Subir Archivo') }}
	                {{ Form::file('file') }}
	                <small>Formatos Permitido Unicamente PDF MAXIMO 20MB</small><br>
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
                <a href="{{ route('doc.index') }}" class="btn btn-primary">Cancelar</a>
                {{ Form::submit('Guardar',['class'=>'btn btn-success']) }}
            </div>
        </div>

			{!! Form::close() !!}
		  </div>
		</div>
	</div>
</div>
@endsection