@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2 style="font-size: 18px;">Editar cronograma / actividad · Cultura<small></small></h2>
		  	@include('serve.alerts.alerts')
		    <ul class="nav navbar-right panel_toolbox">
		      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
		      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
		    </ul>
		    <div class="clearfix"></div>
		  </div>
		  <div class="x_content form-horizontal form-label-left">
		  	<br/>
			{!! Form::model($document, ['route'=>['cultura.update', $document->id], 'method'=>'PUT','files'=>true])!!}
	        	@include('serve.cultura.partials.form')
        	{!! Form::close() !!}
		  </div>
		</div>
	</div>
</div>
@endsection
