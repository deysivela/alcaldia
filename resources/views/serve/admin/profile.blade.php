@extends('serve.layouts.index')
@section('content')
	<div class="container">
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="font-size: 18px;">Informacion del Usuario</h2>
                    {{--  @if (session('error'))
			            <div class="alert alert-danger">
			                {{ session('error') }}
			            </div>
			        @endif
			        @if (session('success'))
			            <div class="alert alert-success">
			                {{ session('success') }}
			            </div>
			        @endif --}}
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
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{ asset($user->employees['photo']) }}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3>{{ $user->employees['name'] }} {{ $user->employees['last_name'] }}</h3>

                      <ul class="list-unstyled user_data">
	                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $user->employees['address'] }}
	                        </li>

	                        <li>
	                          <i class="fa fa-briefcase user-profile-icon"></i> {{ $user->employees['charges']['charge_employee'] }}
	                        </li>
                      </ul>
					<form action="/profile" method="POST" role="form" enctype="multipart/form-data">
						@csrf
						<div class="col-md-offset-3">
							<div class="form-group">
								{{-- <input type="file" name="photo" id="photo">  --}}
								<label class="btn btn-round btn-success btn-file"><i class="fa fa-cloud-upload"></i>
								    Editar Perfil <input type="file"name="photo" id="photo" style="display: none;">
								</label>
								<input type="hidden" name="_token" value="{{csrf_token()}}">
							</div>
						</div>

						<div class="clearfix"></div>
						<div class="btn-group btn-group-justified" role="group" aria-label="...">
						  <div class="btn-group" role="group">
						 	<button type="submit" class="btn btn-round btn-success "><i class="fa fa-edit m-right-xs"></i>Actualizar</button>
						  </div>
						</div>
					</form>
                    <br/>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1">
						<div class="row">
							<div class="profile_title">
								<div class="col-md-12">
									<h2 style="font-size: 18px;text-align: center;">Actualizar Cuenta</h2>
								</div>
							</div>
						</div>
						<br/>

						<div class="row">
							<div class="profile_title">
								<div class="col-md-5">
									<h2 style="font-size: 15px;letter-spacing: 1px;"><strong>Usuario</strong></h2>
								</div>
								<div class="col-md-5">
									<h2 style="font-size: 15px;letter-spacing: 1px;">{{ $user->user }}</h2>
								</div>
								<div class="col-md-2">
									<a class="btn btn-success panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-edit m-right-xs"></i></a>
								</div>
							</div>


		 					<!-- start accordion -->
		                    <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
		                      <div class="panel">
		                        <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		                          <div class="panel-body">
									<form class="form-horizontal form-label-left" method="POST" action="profile/{{ $user->id }}">
										@method('PUT')
							         	@csrf
							         	<div class="form-group">
					                        <label for="new-password" class="col-md-5 col-sm-5 col-xs-12 control-label">Nuevo Usuario</label>
									          <div class="col-md-7 col-sm-7 col-xs-12">
									              <input id="user" type="user" class="form-control" name="user" required>
									          </div>
									    </div>
									      <div class="clearfix"></div>
								          <div class="ln_solid"></div>
								          <div class="form-group">
								            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
								              {{ Form::submit('Actualizar', ['class'=>'btn btn-success']) }}
								            </div>
								          </div>
									</form>
		                          </div>
		                        </div>
		                      </div>
		                    </div>
		                    <!-- end of accordion -->
		                </div>

						<div class="row">	
							<div class="profile_title">
								
								<div class="col-md-5">
									<h2 style="font-size: 15px;letter-spacing: 1px;"><strong>Contraseña</strong></h2>
								</div>
								<div class="col-md-5">
									<h2 style="font-size: 23px;letter-spacing: 1px;">*****************</h2>
								</div>
								<div class="col-md-2">
									<a class="btn btn-success panel-heading collapsed"  role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-edit m-right-xs"></i></a>
								</div>
							</div>
							<!-- start accordion -->
			                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
			                  <div class="panel">
			                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			                      <div class="panel-body">
									<form class="form-horizontal form-label-left" method="POST" action="profile/{{ $user->id }}">
										@method('PUT')
					          			@csrf
					                      <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
					                        <label for="new-password" class="col-md-5 col-sm-5 col-xs-12 control-label">Contreseña Actual</label>
									          <div class="col-md-7 col-sm-7 col-xs-12">
									              <input id="current-password" type="password" class="form-control" name="current-password" placeholder="Contraseña Actual" required>
									              @if ($errors->has('current-password'))
									                <span class="help-block">
									                  <strong>{{ $errors->first('current-password') }}</strong>
									                </span>
									              @endif
									          </div>
									      </div>

									      <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
									      	<label for="new-password" class="col-md-5 col-sm-5 col-xs-12 control-label">Contreseña Nueva</label>
									          <div class="col-md-7 col-sm-7 col-xs-12">
									              <input id="new-password" type="password" class="form-control" name="new-password" placeholder="Contraseña Nueva" required>
									              @if ($errors->has('new-password'))
									                <span class="help-block">
									                  <strong>{{ $errors->first('new-password') }}</strong>
									                </span>
									              @endif
									          </div>
									      </div>

									      <div class="form-group">
									      	<label for="new-password" class="col-md-5 col-sm-5 col-xs-12 control-label">Confirmar Contreseña</label>
									          <div class="col-md-7 col-sm-7 col-xs-12">
									              <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" placeholder="Confirmar Contraseña" required>
									          </div>
									      </div>
							      		  <div class="clearfix"></div>
								          <div class="ln_solid"></div>
								          <div class="form-group">
								            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
								              <button type="submit" class="btn btn-success">Actualizar</button>
								            </div>
								          </div>
									</form>
			                      </div>
			                    </div>
			                  </div>
			                </div>
			                <!-- end of accordion -->
						</div>
                      <!-- start of user-activity-graph -->
                      <div id="graph_bar" style="width:100%; height:280px;"></div>
                      <!-- end of user-activity-graph -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

{{-- 			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="color: black;">
				<legend style="margin-left: 20%;margin-top: 10px;"><strong>Informacion Administrador</strong></legend>
				<img src="/server/build/images/user/{{$user->photo}}" class="img-responsive" alt="Image" style="width: 150px; height: 150px; border-radius: 50%; float: left; margin-right: 30px;">	
				Nombre: <strong>{{$user->name}} Mamani Jucumari</strong><br>
				Correo Electronico: <strong>{{$user->email}}</strong><br>
				Telefono cel: <strong>{{$user->phone}}</strong>
				<hr>
				<form action="/profile" method="POST" role="form" enctype="multipart/form-data">
					@csrf
					<div class="col-md-5 col-sm-5 col-xs-12">
						<div class="form-group">
							<label for="">Actualizar imagen del Perfil</label>
							<input type="file" name="photo" id="photo"> 
							<input type="hidden" name="_token" value="{{csrf_token()}}">
						</div>
					</div>
					<div class="clearfix"></div>
					<button type="submit" class="btn btn-primary" style="margin-left: 21%;">Actualizar</button>
					
				</form>
			</div> --}}
	</div>
@endsection