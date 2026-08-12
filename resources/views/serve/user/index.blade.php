@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
		  	@can('users.create')
		  	<a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo Usuario</a>
		  	@endcan
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
		    <table id="datatable-buttons" class="table table-striped table-bordered">
		      <thead>
		        <tr>
		          <th>Funcionario</th>
		          <th>Cargo u Ocupacion</th>
		          <th>Estado</th>
		          <th>Usuario</th>
		          <th>Contraseña</th>
		          <th class="center">Accion</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($users as $user)
		        @php
		        	$employee = $user->employees;
		        	$charge = $employee ? $employee->charges : null;
		        @endphp
		        <tr>
		          <td>{{ $employee ? trim($employee->name.' '.$employee->last_name) : '—' }}</td>
		          <td>{{ $charge ? $charge->charge_employee : '' }}</td>
		          <td>{{ $user->statu }}</td>
		          <td>{{ $user->user }}</td>
		          <td>*********************</td>
                  <td>
                  	<ul class="action">
                  		@can('adds.edit')
	          			<li>
							<a href="{{ route('adds.edit', $user->id) }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Añadir Roles</a>
						</li>
						@endcan
	          			@can('users.show')
	          			<li>
							<a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detalle</a>
						</li>
						@endcan
	          			@can('users.edit')
	          			<li>
							<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Editar</a>
						</li>
						@endcan
	          			@can('users.destroy')
	          			<li>
						{!! Form::open(['route'=>['users.destroy', $user->id], 'method'=>'DELETE']) !!}
						<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
						{!! Form::close() !!}
						</li>
						@endcan
                  	</ul>
		          </td>
		        </tr>
		        @endforeach
		      </tbody>
		    </table>
		  </div>
		</div>
	</div>
</div>
@endsection
