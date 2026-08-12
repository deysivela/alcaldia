@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
{{-- 		  	<h2 style="font-size: 18px;">Documentos Registrados<small></small></h2> --}}
		  	@can('doc.create')
		  	<a href="{{ route('salaries.create') }}" class="btn btn-primary">Agregar Nuevo Salario</a>
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
		          <th>Categoria</th>
		          <th>Clase</th>
		          <th>Nivel Salarial</th>
		          <th>Denominacion</th>
		          <th>Numero de Items</th>
		          <th>Sueldo Mensual</th>
		          <th>Sueldo Total</th>
		          <th class="center">Accion</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($salaries as $salarie)
		        <tr>
		          <td>{{ $salarie->salcats['category'] }}</td>
		          <td>{{ $salarie->clases['clase'] }}</td>
      			  <td>{{ $salarie->level_salary }}</td>
      			  <td>{{ $salarie->denomination }}</td>
      			  <td>{{ $salarie->nro_item }}</td>
      			  <td>{{ $salarie->salary_monthly }}</td>
      			  <td>{{ $salarie->salary_total }}</td>
				  <td>
		          	<ul class="action">
			          	@can('doc.edit')
			          	<li>
			          		<a href="{{ route('salaries.edit', $salarie->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Editar</a>
			          	</li>
			          	@endcan
	      	  			@can('doc.destroy')
	      	  			<li>
				          	{!! Form::open(['route'=>['salaries.destroy',$salarie->id],'method'=>'DELETE']) !!}
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
