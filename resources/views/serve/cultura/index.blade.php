@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
		  	<h2 style="font-size: 18px;">Cultura · Cronogramas y actividades<small></small></h2>
		  	@include('serve.alerts.alerts')
		    <ul class="nav navbar-right panel_toolbox">
		      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
		      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
		    </ul>
		    <div class="clearfix"></div>
		  </div>
		  <div class="x_content">
		  	@can('cultura.create')
		  	<p>
		  		<a href="{{ route('cultura.create') }}" class="btn btn-success">
		  			<i class="fa fa-plus"></i> Nuevo cronograma / actividad
		  		</a>
		  	</p>
		  	@endcan
		    <table id="datatable-buttons" class="table table-striped table-bordered">
		      <thead>
		        <tr>
		          <th>Título</th>
		          <th>Tipo</th>
		          <th>Fecha</th>
		          <th class="center">Acción</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($documents as $document)
		        @php
		        	$ext = $document->file ? strtolower(pathinfo($document->file, PATHINFO_EXTENSION)) : '';
		        	$tipo = in_array($ext, ['jpg','jpeg','png','gif','webp'], true) ? 'Imagen' : 'PDF';
		        @endphp
		        <tr>
		          <td>{{ $document->entity }}</td>
		          <td>{{ $tipo }}</td>
      			  <td>{{ $document->date_creation }}</td>
				  <td>
		          	<ul class="action">
	          			@can('cultura.show')
		          		<li>
		          			<a href="{{ route('cultura.show', $document->id) }}" class="btn btn-sm btn-default"><i class="fa fa-eye"></i> Detalle</a>
			          	</li>
			         	@endcan
			          	@can('cultura.edit')
			          	<li>
			          		<a href="{{ route('cultura.edit', $document->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Editar</a>
			          	</li>
			          	@endcan
	      	  			@can('cultura.destroy')
	      	  			<li>
				          	{!! Form::open(['route' => ['cultura.destroy', $document->id], 'method'=>'DELETE']) !!}
								<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
				          	{!! Form::close() !!}
			          	</li>
			          	@endcan
			          	@can('cultura.edit')
			          	<li>
			          		<a class="btn btn-sm btn-{{ ($document->publish == 1) ? 'success':'dark' }}" href="{{ route('cultura.publish', $document->id) }}">
			          			<small style="color: white;">{{ ($document->publish == 1) ? 'PUBLICADO':'NO PUBLICADO' }}</small>
			          		</a>
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
