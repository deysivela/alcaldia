@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
		  	<a href="{{ url('/user/create') }}" class="btn btn-primary">Nuevo Registro</a>
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
		          <th>Nombres</th>
		          <th>Apellidos</th>
		          <th>Correo Electronico</th>
		          <th>Contraseña</th>
		          <th>Estado</th>
		          <th>Editar</th>
		          <th>Eliminar</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($userseconds as $usersecond)
		        <tr>
		          <td>{{ $usersecond->nombre }}</td>
		          <td>{{ $usersecond->apellido }}</td>
		          <td>{{ $usersecond->email }}</td>
		          <td>{{ $usersecond->password }}</td>
		          <td>
		          	<div class="">
	                    <label>
	                      <input type="checkbox" class="js-switch" /> Inactivo
	                    </label>
                  	</div>			
                  </td>
		          <td><a href="/user/{{ $usersecond->id }}/edit" class="btn btn-warning btn-sm" style=""><i class="fa fa-edit" style="margin-right: 3px;"></i>Editar</a></td>
		          <td>
		          	<form action="/user/{{ $usersecond->id }}" method="POST">
		          		@method('DELETE')
		          		@csrf
		          		<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-remove" style="margin-right: 3px;"></i>Eliminar</button>
		          	</form>
		          </td>
		          {{-- <td><a href="" class="btn btn-danger btn-sm"><i class="fa fa-remove" style="margin-right: 3px;"></i>Eliminar</a></td> --}}
		        </tr>
		        @endforeach
		      </tbody>
		    </table>
		  </div>
		</div>
	</div>
</div>
@endsection