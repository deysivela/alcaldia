@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
		  	@can('roles.create')
		  	<a href="{{ route('roles.create') }}" class="btn btn-primary">Nuevo Rol</a>
		  	@endcan
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
		  	<h5 style="text-align: center;"><strong>Listado de Roles</strong></h5>
		    <table class="table table-striped table-bordered">
		      <thead>
		        <tr>
		          {{-- <th>Id</th>	 --}}
		          <th>Nombre</th>
		          <th>Accion</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($roles as $role)
		        <tr>
	        	  {{-- <td>{{ $role->id }}</td> --}}
		          <td>{{ $role->name }}</td>
		          <td>
		          	{{-- @can('roles.show')
					<div style="float: left; display: inline-block;">
						<a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
					</div>
					@endcan --}}
					@can('roles.edit')
					<div style="float: left; display: inline-block;">
						<a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
					</div>
					@endcan
					@can('roles.destroy')
					<div style="float: left; display: inline-block;">
					{!! Form::open(['route'=>['roles.destroy', $role->id], 'method'=>'DELETE']) !!}
						<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
					{!! Form::close() !!}
					</div>
					@endcan
		          </td>
		        </tr>
		        @endforeach
		      </tbody>
		    </table>
		  </div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
		  	<h2 style="font-size: 18px;"><strong>Permisos Especiales</strong><small></small></h2>
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
			@foreach($specials as $special)
	        <!-- start accordion -->
            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel">
                <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#{{ $special->id }}" aria-expanded="true" aria-controls="collapseOne">
                  <h4 class="panel-title">{{ $special->name }}</h4>
                </a>
                <div id="{{ $special->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Permiso</th>
                          <th>Descripcion</th>
                          <th>Ultima Actualizacion</th>
                        </tr>
                      </thead>
                      <tbody>	
						<tr>
							<th scope="row">{{ $special->id }}</th>
							<td>{{ $special->special }}</td>
							<td>{{ $special->description }}</td>
							<td>{{ $special->updated_at }}</td>
						</tr>	
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of accordion -->
            @endforeach  
		  </div>
		</div>

		<div class="x_panel">
		  <div class="x_title">
		  	<h2 style="font-size: 18px;"><strong>Permisos de Roles creados</strong><small></small></h2>
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
			@foreach($rolecreados as $rolecreado)
	        <!-- start accordion -->
            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel">
                <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#{{ $rolecreado->id }}" aria-expanded="true" aria-controls="collapseOne">
                  <h4 class="panel-title">{{ $rolecreado->name }}</h4>
                </a>
                <div id="{{ $rolecreado->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Permiso</th>
                          <th>Ultima Actualizacion</th>
                          <th>Quitar</th>
                        </tr>
                      </thead>
                      <tbody>	
						@foreach($rolecreado->permissions as $rol)
						<tr>
							<th scope="row">{{ $rol->id }}</th>
							<td>{{ $rol->name }}</td>
							<td>{{ $rol->updated_at }}</td>
							<td>
							{{-- {!! Form::open(['route'=>['roles.destroy', $role->id], 'method'=>'DELETE']) !!} --}}
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
							{{-- {!! Form::close() !!} --}}
							</td>
						</tr>	
						@endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of accordion -->
            @endforeach  
		  </div>
		</div>
</div>
</div>
@endsection