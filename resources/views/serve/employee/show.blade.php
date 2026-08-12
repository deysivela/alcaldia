@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<div class="x_panel">
		  <div class="x_title">
			<h2 style="font-size: 18px;">Informacion del Funcionario<small></small></h2>
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
		  <div class="x_content">
			<div class="card" style="width: 100%;">
			  <img class="card-img-top center-block" src="{{ asset( $employee->photo) }}" alt="Foto Funcionario" style="width: 40%;">
			  <div class="card-body">
			   <p><strong>Nombres</strong> {{ $employee->name }}</p> 
			   <p><strong>Apellidos</strong> {{ $employee->last_name }}</p>
			   <p><strong>Genero</strong> {{ $employee->sex }}</p> 
			   <p><strong>Direccion</strong> {{ $employee->address }}</p>
			   <p><strong>Telefono</strong> {{ $employee->phone }}</p>
			   <p><strong>Correo electronico</strong> {{ $employee->email }}</p>
			   <p><strong>Nivel de Empleado</strong> {{ $employee->levels->level_employee }}</p>
			   <p><strong>Tipo de Empleado</strong> {{ $employee->type_employee }}</p>
			   <p><strong>Cargo del Empleado</strong> {{ $employee->charges->charge_employee}}</p>
			   {{-- <p><strong>Sueldo Mensual</strong> {{ $employee->salaries->salary_monthly }}</p>  --}}
				<div class="clearfix"></div>
				<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
						<a href="{{ route('employees.index') }}" class="btn btn-primary">Regresar</a>
					</div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	</div>
</div>
@endsection