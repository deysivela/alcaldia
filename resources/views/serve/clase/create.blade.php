@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="font-size: 18px;">Nueva Clase Salarial<small></small></h2>
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
        <br />
        <form class="form-horizontal form-label-left" method="POST" action="/clases">
          @csrf
		<div class="col-md-6 col-sm-6 col-xs-12">
		  <div class="form-group">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Ingrese Nueva Clase
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" name="clase" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
		</div>
		  <div class="clearfix"></div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
              <a href="{{ route('clases.index')}}" class="btn btn-primary">Cancelar</a>
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="font-size: 18px;">Listado de Clases<small></small></h2>
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
        <br />
		<table id="datatable-buttons" class="table table-striped table-bordered">
		    <thead>
		        <tr>
		          <th>Clase</th>
		          <th>Eliminar</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($clases as $clase)
		        <tr>
		          <td>{{ ($clase->clase) }}</td>
		          <td>
		          	<form action="/clases/{{ $clase->id }}" method="POST">
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