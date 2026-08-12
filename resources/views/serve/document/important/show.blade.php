@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2 style="font-size: 18px;">Informacion del Documento<small></small></h2>
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
		  	<table class="table table-striped table-bordered">
		  		<thead>
		  			<tr>
		  				<th>Tipo de Documento</th>
		  				<th>Nombre del Documento</th>
		  				<th>Datos & Informacion</th>
		  				<th>Fecha de Creacion</th>
		  			</tr>
		  		</thead>
		  		<tbody>
		  			<tr>
		  				<td>{{ $document->categorie}}</td>
		  				<td>{{ $document->name_document }}</td>
		  				<td>{{ $document->data_document }}</td>
		  				<td>{{ $document->date_creation }}</td>
		  			</tr>
		  		</tbody>
		  	</table>
				<div class="clearfix"></div>
				<div class="ln_solid"></div>
				<h2 style="font-size: 18px;" class="center">Vista Previa del Documento Importante<small></small></h2>
				<div class="embed-responsive embed-responsive-16by9">
    				<object class="embed-responsive-item" data="{{ asset($document->file) }}" type="application/pdf" internalinstanceid="9" title="">
        			<p>Su navegador no soporta el archivo. Si desea puede descargar el mismo de aqui 
            		<a href="{{ asset($document->file) }}">Descargar</a>.</p>
    				</object>
				</div>
		  </div>
		</div>
	</div>
</div>
@endsection
