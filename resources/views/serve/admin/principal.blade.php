@extends('serve.layouts.index')
@section('content')
@can('users.index')
<div class="container" role="main">
  <div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
          <div class="count green">{{ $users->count() }}</div>
        <h3>Usuarios</h3>
        <p><a href="{{ route('users.index') }}">Mas Informacion <i class="green fa fa-info-circle"></i></a></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
        <div class="count green">{{ $roles->count() }}</div>
        <h3>Roles</h3>
        <p><a href="{{ route('roles.index') }}">Mas Informacion <i class="green fa fa-info-circle"></i></a></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-unlock"></i></div>
        <div class="count green">{{ $permissions->count() }}</div>
        <h3>Permisos</h3>
        <p><a href="{{ route('roles.index') }}">Mas Informacion <i class="green fa fa-info-circle"></i></a></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-male"></i></div>
        <div class="count green">{{ $employees->count() }}</div>
        <h3>Funcionarios</h3>
        <p><a href="{{ route('employees.index') }}">Mas Informacion <i class="green fa fa-info-circle"></i></a></p>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="font-size: 18px;">Usuarios del Sistema<small></small></h2>
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
        <div class="row">
          @foreach($users as $user)
          @if($user->employees)
          <div class="col-md-2">
              <div class="image view view-first" style="border-radius: 50%;">
                <img style="width: 100%; height: 150px;" src="{{asset($user->employees['photo'])}}" alt="image" />
              </div>
              <div>
                <p class="" style="text-align: center;">{{ $user->employees['name'] }} {{ $user->employees['last_name'] }}</p>   
              </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endcan

<div class="tile-stats" style="text-align: center;">
    <div class="count green">BIENVENIDO AL PANEL DE ADMINISTRACION DEL SISTEMA</div>
</div>


@endsection