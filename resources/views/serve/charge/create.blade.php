@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="font-size: 18px;">Registro de Cargos <small></small></h2>
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
        <form class="form-horizontal form-label-left" method="POST" action="/charges">
          @csrf
		<div class="col-md-10 col-sm-10 col-xs-12">
      <div class="form-group">
        {{ Form::label('level_id','Nivel', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
        <div class="col-md-8 col-sm-8 col-xs-12">
        {{ Form::select('level_id',$levels, null,['class'=>'form-control','placeholder'=>'Eliga un Nivel a la que pertenece']) }}
        @if ($errors->has('level_id'))
                <span class="error" role="alert">
                    <strong>{{ $errors->first('level_id') }}</strong>
                </span>
            @endif
        </div>
      </div>
      <div class="form-group">
        {{ Form::label('charge_employee','Nuevo Cargo', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
        <div class="col-md-8 col-sm-8 col-xs-12">
        {{ Form::text('charge_employee',null,['class'=>'form-control']) }}
        @if ($errors->has('charge_employee'))
                <span class="error" role="alert">
                    <strong>{{ $errors->first('charge_employee') }}</strong>
                </span>
            @endif
        </div>
      </div>

		</div>
		  <div class="clearfix"></div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
              <a href="{{ route('charges.create') }}" class="btn btn-primary">Cancelar</a>
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
        <h2 style="font-size: 18px;">Listado de Cargos<small></small></h2>
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
              <th>Nivel</th>
		          <th>Cargo</th>
		          <th>Eliminar</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($charges as $charge)
		        <tr>
              <td>{{ $charge->levels['level_employee'] }}</td>
		          <td>{{ $charge->charge_employee }}</td>
		          <td>
		          	<form action="/charges/{{ $charge->id }}" method="POST">
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