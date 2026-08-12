@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2 style="font-size: 18px;">Edicion de Funcionarios<small></small></h2>
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
			{!! Form::model($employee, ['route'=>['employees.update',$employee->id], 'method'=>'PUT','files'=>true])!!}

			<div class="col-md-6 col-sm-6 col-xs-12">

	{{-- {{ Form::hidden('user_id', auth()->user()->id) }} --}}

{{-- 	<div class="form-group">
		{{ Form::label('user_id','Usuario', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('user_id', null,['class'=>'form-control','placeholder'=>'elija su usuario']) }}
		@if ($errors->has('user_id'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('user_id') }}</strong>
            </span>
        @endif
		</div>
	</div> --}}

	<div class="form-group">
		{{ Form::label('name','Nombres', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
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
		{{ Form::label('last_name','Apellidos', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::text('last_name',null,['class'=>'form-control']) }}
		@if ($errors->has('last_name')) 
            <span class="error" role="alert">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
		</div>
	</div>
	{{-- <div class="form-group">
		{{ Form::label('sex','Sexo', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('sexo',array('1'=>'Masculino','2'=>'Femenino'),null,['class'=>'form-control']) }}
		@if ($errors->has('sexo'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('sexo') }}</strong>
            </span>
        @endif
		</div>
	</div> --}}
	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4 col-xs-12">Sexo</label>
		<div class="col-md-8 col-sm-8 col-xs-12">
			<select name="sex" class="form-control">
			<option value="{{ $employee->sex }}" selected="" hidden="">{{ $employee->sex }}</option>	
			<option value="Masculino">Masculino</option>
			<option value="Femenino">Femenino</option>
		</select>
		@if ($errors->has('sex'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('sex') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('address','Direccion', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::textarea('address',null,['class'=>'form-control','rows'=>'2','maxlength'=>215]) }}
		@if ($errors->has('address'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('phone', 'Telefono', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
			{{ Form::text('phone', null,['class'=>'form-control']) }}
			@if ($errors->has('phone'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Correo Electronico', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
			{{ Form::text('email', null,['class'=>'form-control']) }}
			@if ($errors->has('email'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<br>
	<div class="form-group">
		{{ Form::label('photo', 'Foto de perfil',['class'=>'control-label col-md-4 col-sm-4']) }}
		{{ Form::file('photo', null,['class'=>'form-control']) }}
		<small>Formatos Permitidos JPG,PNG MAX 1MB</small><br>
		@if ($errors->has('photo'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('photo') }}</strong>
            </span>
        @endif
	</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4 col-xs-12">Tipo de Empleado</label>
		<div class="col-md-8 col-sm-8 col-xs-12">
			<select class="form-control" name="type_employee">
				<option value="{{ $employee->type_employee }}" selected="" hidden="">{{ $employee->type_employee }}</option>
				<option value="Autoridad">Autoridad</option>
				<option value="Normal">Normal</option>
			</select>
			@if ($errors->has('type_employee'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('type_employee') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('level_id','Nivel del Empleado', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('level_id',$levels, null,['class'=>'form-control','placeholder'=>'elija su nivel']) }}
		@if ($errors->has('level_id'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('level_id') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('charge_id','Cargo del Empleado', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('charge_id',$charges, null,['class'=>'form-control','placeholder'=>'elija el cargo']) }}
		@if ($errors->has('charge_id'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('charge_id') }}</strong>
            </span>
        @endif
		</div>
	</div>
	{{-- <div class="form-group">
		{{ Form::label('salarie_id','Salario', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('salarie_id',$salaries, null,['class'=>'form-control','placeholder'=>'Escoger su Salario']) }}
		@if ($errors->has('salarie_id'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('salarie_id') }}</strong>
            </span>
        @endif
		</div>
	</div> --}}
</div>				

<div class="clearfix"></div>
<div class="ln_solid"></div>

<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
		<a href="{{ route('employees.index') }}" class="btn btn-primary">Cancelar</a>
		{{ Form::submit('Guardar',['class'=>'btn btn-success']) }}
	</div>
</div>

			{!! Form::close() !!}
		  </div>
		</div>
	</div>
</div>
@endsection