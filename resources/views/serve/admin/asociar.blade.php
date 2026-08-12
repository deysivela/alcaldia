@extends('serve.layouts.index')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="font-size: 18px;">Panel de Vinculacion para Administrador<small></small></h2>
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
        {!! Form::model($user, ['route'=>['admins.update', $user->id], 'method'=>'PUT']) !!}

      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          {{ Form::label('employee_id','Funcionario', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
          <div class="col-md-8 col-sm-8 col-xs-12">
          {{ Form::select('employee_id',$employees, null,['class'=>'form-control','placeholder'=>'Seleccione Su Identidad']) }}
          @if ($errors->has('employee_id'))
                  <span class="error" role="alert">
                      <strong>{{ $errors->first('employee_id') }}</strong>
                  </span>
              @endif
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="user" class="control-label col-md-4 col-sm-4 col-xs-12">Usuario del Sistema</label>
            <div class="col-md-8 col-sm-8 col-xs-12{{ $errors->has('user') ? ' has-error' : '' }}">
              <input id="user" class="form-control col-md-7 col-xs-12 {{ $errors->has('user') ? ' has-error' : '' }}" required autofocus type="text" name="user" value="{{ $user->user }}" readonly="true">
              <span class="help-block">{{ $errors->first('user') }}</span>
            </div>
          </div>

          <div class="jumbotron" hidden="true">
            <h3>Lista de roles</h3>
            <div class="form-group">
              <ul class="list-unstyled">
                @foreach($roles as $role)
                <li>
                  <label>
                    {{ Form::checkbox('roles[]',$role->id, null)}}
                    {{ $role->name }}
                    <em>({{ $role->description ?: 'Sin Descripcion'  }})</em>
                  </label>
                </li>
                @endforeach
              </ul>
            </div>
          </div>

      </div>
      <div class="clearfix"></div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
              <a href="{{ route('users.index') }}" class="btn btn-primary">Cancelar</a>
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </div>
        {!! Form::close() !!}

      </div>
    </div>
  </div> 
</div>
@endsection