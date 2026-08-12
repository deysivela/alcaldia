@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
		  	<h2 style="font-size: 18px;">Informes de Auditoria<small></small></h2>
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
		          <th>Codigo</th>
		          <th>Entidad</th>
		          <th>Estado</th>
		          <th>Descripcion</th>
		          <th>Fecha de Publicacion</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($ia as $ia)
		        <tr>
        		  <td>{{ $ia->cod }}</td>
		          <td>{{ $ia->entity }}</td>
		          <td>{{ $ia->statu }}</td>
      			  <td>{{ $ia->description }}</td>
      			  <td>{{ $ia->date_creation }}</td>
		        </tr>
		        @endforeach
		      </tbody>
		    </table>
		  </div>
		</div>
	</div>
</div>
@endsection
