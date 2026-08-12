@extends('serve.layouts.index')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="font-size: 18px;">Actualizar Usuario<small></small></h2>
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
        <form class="form-horizontal form-label-left" method="POST" action="/user/{{ $usersecond->id }}" enctype="multipart/form-data">
		@method('PUT')
        @csrf
		<div class="col-md-6 col-sm-6 col-xs-12">
		  <div class="form-group">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Nombre
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" value="{{ $usersecond->nombre }}" id="name" name="nombre" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="apelido">Apellido
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" value="{{ $usersecond->apellido }}" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Correo Electronico</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input id="middle-name" value="{{ $usersecond->email }}" class="form-control col-md-7 col-xs-12" type="email" name="email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-4 col-xs-12">Contraseña</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input id="birthday" value="{{ $usersecond->password }}" class="form-control col-md-7 col-xs-12" type="password" name="password">
            </div>
          </div>
		  <div class="form-group">
            <label class="control-label col-md-4 col-sm-4 col-xs-12">Estado</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <select class="form-control" name="estado">
                <option value="" disabled selected hidden>Eligir Opción</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>
          </div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
            	<div class="col-md-9 col-sm-9 col-xs-12">
              	<input type="file" value="" id="profile-img" name="foto" class=" jo form-control col-md-7 col-xs-12">
            	</div>
          	</div>
          	<div class="form-group">
          		<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          			<img src="server/build/images/usersecond/{{ $usersecond->avatar }}" id="profile-img-tag" width="170px" style="border-radius: 2%;">	
          		</div>
          	</div>
		</div>
		  <div class="clearfix"></div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
              <a href="{{ url('/user') }}" class="btn btn-primary">Cancelar</a>
              <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
</div>
@endsection