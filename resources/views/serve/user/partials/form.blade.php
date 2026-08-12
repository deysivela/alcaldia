<div class="col-md-6 col-sm-6 col-xs-12">

  <div class="form-group">
    {{ Form::label('employee_id','Funcionario', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
    <div class="col-md-8 col-sm-8 col-xs-12{{ $errors->has('employee_id') ? ' has-error' : '' }}">
    {{ Form::select('employee_id',$employees, null,['class'=>'form-control','placeholder'=>'Eliga un Funcionario','autofocus']) }}
    <span class="help-block">{{ $errors->first('employee_id') }}</span>
    </div>
  </div>

  {{-- <div class="form-group">
    {{ Form::label('statu','Estado', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
    <div class="col-md-8 col-sm-8 col-xs-12">
    {{ Form::select('statu',null,['class'=>'form-control','placeholder'=>'Eligir su Estado']) }}
    @if ($errors->has('statu'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('statu') }}</strong>
            </span>
        @endif
    </div>
  </div> --}}
  <div class="form-group">
    <label class="control-label col-md-4 col-sm-4 col-xs-12">Estado</label>
    <div class="col-md-8 col-sm-8 col-xs-12{{ $errors->has('statu') ? ' has-error' : '' }}">
      <select class="form-control" name="statu" autofocus="">
        <option value="" disabled selected hidden="">Seleccione su Estado</option>
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
      </select>
      <span class="help-block">{{ $errors->first('statu') }}</span>
    </div>
  </div>

</div>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
    {{ Form::label('user','Usuario', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
    <div class="col-md-8 col-sm-8 col-xs-12{{ $errors->has('user') ? ' has-error' : '' }}">
    {{ Form::text('user',null,['class'=>'form-control','placeholder'=>'Ingrese su Nombre de Usuario','autofocus']) }}
    <span class="help-block">{{ $errors->first('user') }}</span>
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('password','Contraseña', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
    <div class="col-md-8 col-sm-8 col-xs-12{{ $errors->has('password') ? ' has-error' : '' }}">
    {{ Form::input('password','password',null,['class'=>'form-control','placeholder'=>'Ingrese su contraseña','autofocus']) }}
    <span class="help-block">{{ $errors->first('password') }}</span>
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('password_confirmation','Confirmar Contraseña', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
    <div class="col-md-8 col-sm-8 col-xs-12{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    {{ Form::input('password','password_confirmation',null,['class'=>'form-control','placeholder'=>'Repita la Contraseña','autofocus']) }}
    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
    </div>
  </div>

</div>

  <div class="clearfix"></div>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
      <a href="{{ route('users.index') }}" class="btn btn-primary">Cancelar</a>
      {{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
    </div>
  </div>

  {{-- <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Nombre</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <input type="text" value="{{ $user->name }}" id="name" name="name" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last_name">Apellidos</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <input type="text" value="{{ $user->last_name }}" id="last_name" name="last_name" required="required" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="control-label col-md-4 col-sm-4 col-xs-12">Correo Electronico</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <input id="email" value="{{ $user->email }}" class="form-control col-md-7 col-xs-12" type="email" name="email">
        </div>
      </div>
      <div class="form-group">
        <label for="telephone" class="control-label col-md-4 col-sm-4 col-xs-12">Telefono</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <input id="telephone" value="{{ $user->phone }}" class="form-control col-md-7 col-xs-12" type="text" name="phone">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Estado</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <select class="form-control" name="statu">
            <option value="" disabled selected hidden>Eligir Opción</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-4">
          <label class="control-label"><strong style="letter-spacing: 2px;">Fotografia del Usuario</strong></label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-4">
          <img src="{{asset('/server/build/images/user/'.$user->photo)}}" id="profile-img-tag" alt="muestra" width="170px" style="border-radius: 50%;">  
        </div>
      </div>
  </div>
  
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div style="padding-top: 5px;padding-left: 20px;" class="jumbotron">
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
      <a href="{{ url('users') }}" class="btn btn-primary">Cancelar</a>
      {{ Form::submit('Actualizar', ['class'=>'btn btn-success']) }}
    </div>
  </div> --}}