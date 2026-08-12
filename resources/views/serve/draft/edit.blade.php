@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2 style="font-size: 18px;">Edicion del Proyecto<small></small></h2>
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
			{!! Form::model($draft, ['route'=>['projects.update', $draft->id], 'method'=>'PUT','files'=>true])!!}

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
			<option value="{{ $draft->type }}" selected="" hidden="">{{ $draft->type }}</option>	
			<option value="Salud">Salud</option>
			<option value="Educacion">Educacion</option>
			<option value="Deporte">Deporte</option>
			<option value="Cultura">Cultura</option>
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

			{!! Form::close() !!}
		  </div>
		</div>
	</div>
</div>
@endsection