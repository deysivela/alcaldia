@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
		  	<h2 style="font-size: 18px;">LISTADO DE DOCUMENTOS IMPORTANTES<small></small></h2>
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
		          <th>Nombre Documento</th>
		          <th>Datos Documento</th>
		          <th>Fecha de Subida</th>
		          <th class="center">Accion</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($documents as $document)
		        <tr>

        		  <td>{{ $document->categorie }}</td>
		          <td>{{ $document->name_document }}</td>
		          <td>{{ $document->data_document }}</td>
      			  <td>{{ $document->date_creation }}</td>
				  <td>
		          	<ul class="action">
	          			@can('doc.show')
		          		<li>
		          			<a href="{{ route('important.show', $document->id) }}" class="btn btn-sm btn-default"><i class="fa fa-eye"></i> Detalle</a>
			          	</li>
			         	@endcan
			          	@can('doc.edit')
			          	<li>
			          		<a href="{{ route('important.edit', $document->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Editar</a>
			          	</li>
			          	@endcan
	      	  			@can('doc.destroy')
	      	  			<li>
				          	{!! Form::open(['route' => ['doc.destroy', $document->id], 'method'=>'DELETE']) !!}
								<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
				          	{!! Form::close() !!}
			          	</li>
			          	@endcan
			          	@can('doc.edit')
			          	<li>
			          		<a class="btn btn-sm btn-{{ ($document->publish == 1) ? 'success':'dark' }}"href="{{ route('publish',$document->id) }}"><small style="color: white;">{{ ($document->publish == 1) ? 'PUBLICADO':'NO PUBLICADO' }}</small></a>
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
