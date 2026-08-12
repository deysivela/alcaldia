@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
{{-- 		  	<h2 style="font-size: 18px;">Documentos Registrados<small></small></h2> --}}
		  	@can('doc.create')
		  	<a href="{{ route('employees.create') }}" class="btn btn-primary">Registro de nuevo Empleado</a>
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
		          <th>Nombre(es)</th>
		          <th>Apellidos</th>
		          <th>Telefono</th>
		          <th>Fotografia</th>
		          <th>Cargo</th>
		          <th class="center">Accion</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($employees as $en)
		        <tr>
		          <td>{{ $en->name }}</td>
		          <td>{{ $en->last_name }}</td>
      			  <td>{{ $en->phone }}</td>
          		  <td>
		          	<img src="{{ asset($en->photo) }}" class="img-responsive" alt="Image" style="width: 40px; height: 40px; border-radius: 50%; margin-left: 30px;">
		          </td>
		          {{-- <td>
		          	<div class="">
	                    <label>
	                      <input type="checkbox" class="js-switch" /> Inactivo
	                    </label>
                  	</div>			
                  </td> --}}
      			  <td>{{ $en->charges['charge_employee'] }}</td>
				  <td>
		          	<ul class="action">
		          		@can('doc.show')
			          	<li>
			          		<a href="{{ route('employees.show',$en->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detalles</a>
			          	</li>
			          	@endcan
			          	@can('doc.edit')
			          	<li>
			          		<a href="{{ route('employees.edit',$en->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Editar</a>
			          	</li>
			          	@endcan
	      	  			@can('doc.destroy')
	      	  			<li>
				          	{!! Form::open(['route'=>['employees.destroy',$en->id],'method'=>'DELETE']) !!}
								<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
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
