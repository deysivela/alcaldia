@extends('serve.layouts.index')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="font-size: 18px;">Agregar Roles<small></small></h2>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
      <div class="x_content form-horizontal form-label-left">
        <br />
        {!! Form::model($user, ['route'=>['adds.update', $user->id], 'method'=>'PUT']) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
		<div style="padding-top: 5px;padding-left: 20px;" class="jumbotron">
		  <h3>Lista de roles</h3>
		  <div class="form-group">
		    <ul class="list-unstyled">
		      @foreach($roles as $role)
		      <li>
		        <label>
		          <input type="checkbox" name="roles[]" value="{{ $role->id }}"
		          	{{ $user->roles->contains('id', $role->id) ? 'checked' : '' }}>
		          {{ $role->name }}
		          <em>({{ $role->description ?: 'Sin Descripcion'  }})</em>
		        </label>
		      </li>
		      @endforeach
		    </ul>
		  </div>
		</div>
		</div>
  		<div class="col-md-6 col-sm-6 col-xs-12">
		</div>

  <div class="clearfix"></div>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
      <a href="{{ url('users') }}" class="btn btn-primary">Cancelar</a>
      {{ Form::submit('Actualizar', ['class'=>'btn btn-success']) }}
    </div>
  </div>
        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>
@endsection
