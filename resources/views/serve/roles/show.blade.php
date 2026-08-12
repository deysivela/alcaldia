@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<div class="x_panel">
		  <div class="x_title">
			<h2 style="font-size: 18px;">Detalle del Rol<small></small></h2>
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
		   <p><strong>Id</strong> {{ $role->id }}</p> 
		   <p><strong>Nombre</strong> {{ $role->name }}</p> 
		   <p><strong>Slug</strong> {{ $role->slug }}</p> 
		   <p><strong>Descripcion</strong> {{ $role->description }}</p> 
				<div class="clearfix"></div>
				<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
						<a href="{{ route('roles.index') }}" class="btn btn-primary">Regresar</a>
					</div>
				</div> 
		  </div>
		</div>
	</div>
</div>
@endsection
