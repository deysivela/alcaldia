@extends('serve.layouts.index')
@section('content')
@php
	$ext = $document->file ? strtolower(pathinfo($document->file, PATHINFO_EXTENSION)) : '';
	$isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true);
@endphp
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2 style="font-size: 18px;">Detalle · Cultura<small></small></h2>
		  	@include('serve.alerts.alerts')
		    <ul class="nav navbar-right panel_toolbox">
		      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
		      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
		    </ul>
		    <div class="clearfix"></div>
		  </div>
		  <div class="x_content">
		  	<table class="table table-striped table-bordered">
		  		<thead>
		  			<tr>
		  				<th>Código</th>
		  				<th>Título / Actividad</th>
		  				<th>Estado</th>
		  				<th>Tipo</th>
		  				<th>Descripción</th>
		  				<th>Fecha</th>
		  			</tr>
		  		</thead>
		  		<tbody>
		  			<tr>
		  				<td>{{ $document->cod }}</td>
		  				<td>{{ $document->entity }}</td>
		  				<td>{{ $document->statu }}</td>
		  				<td>{{ $isImage ? 'Imagen' : 'PDF' }}</td>
		  				<td>{{ $document->description }}</td>
		  				<td>{{ $document->date_creation }}</td>
		  			</tr>
		  		</tbody>
		  	</table>
				<div class="clearfix"></div>
				<div class="ln_solid"></div>
				<h2 style="font-size: 18px;" class="center">Vista previa<small></small></h2>
				@if($document->file)
					@if($isImage)
						<div class="text-center">
							<img src="{{ asset($document->file) }}" alt="{{ $document->entity }}" style="max-width:100%;height:auto;">
						</div>
					@else
						<div class="embed-responsive embed-responsive-16by9">
							<object class="embed-responsive-item" data="{{ asset($document->file) }}" type="application/pdf" title="">
								<p>Su navegador no soporta el archivo.
								<a href="{{ asset($document->file) }}">Descargar</a>.</p>
							</object>
						</div>
					@endif
				@endif
				<br>
				<a href="{{ route('cultura.index') }}" class="btn btn-primary">Volver</a>
		  </div>
		</div>
	</div>
</div>
@endsection
