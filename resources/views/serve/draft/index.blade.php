@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
		  	<h2 style="font-size: 18px;">Todos los Proyectos<small></small></h2>
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
		          <th>Nombre</th>
		          <th>Tipo de Proyectos</th>
		          <th>Fotografia</th>
		          <th class="center">Accion</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($drafts as $dra)
		        <tr>
		          <td>{{ $dra->name }}</td>
		          <td>{{ $dra->type }}</td>
      			  <td>
		          	<img src="{{ asset($dra->photo) }}" class="img-responsive" alt="Image" style="width: 80px; height: 80px; margin-left: 30px;">
		          </td>
				  <td>
		          	<ul class="action">
			          	@can('doc.edit')
			          	<li>
			          		<a href="{{ route('projects.edit',$dra->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Editar</a>
			          	</li>
			          	@endcan
	      	  			@can('doc.destroy')
	      	  			<li>
				          	{!! Form::open(['route'=>['projects.destroy', $dra->id],'method'=>'DELETE']) !!}
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
