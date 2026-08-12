<div class="col-md-6 col-sm-6 col-xs-12">

	{{-- {{ Form::hidden('user_id', auth()->user()->id) }} --}}

{{-- 	<div class="form-group">
		{{ Form::label('user_id','Usuario', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('user_id', null,['class'=>'form-control','placeholder'=>'elija su usuario']) }}
		@if ($errors->has('user_id'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('user_id') }}</strong>
            </span>
        @endif
		</div>
	</div> --}}

	<div class="form-group">
		{{ Form::label('name','Nombres', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::text('name',null,['class'=>'form-control']) }}
		@if ($errors->has('name'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('last_name','Apellidos', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::text('last_name',null,['class'=>'form-control']) }}
		@if ($errors->has('last_name')) 
            <span class="error" role="alert">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
		</div>
	</div>
	{{-- <div class="form-group">
		{{ Form::label('sex','Sexo', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('sexo',array('1'=>'Masculino','2'=>'Femenino'),null,['class'=>'form-control']) }}
		@if ($errors->has('sexo'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('sexo') }}</strong>
            </span>
        @endif
		</div>
	</div> --}}
	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4 col-xs-12">Sexo</label>
		<div class="col-md-8 col-sm-8 col-xs-12">
			<select name="sex" class="form-control">
			<option value="" selected="" hidden="">Elija su genero</option>	
			<option value="Masculino"@if(old('sex')=='Masculino'){{ 'selected' }}@endif>Masculino</option>
			<option value="Femenino"@if(old('sex')=='Femenino'){{ 'selected' }}@endif>Femenino</option>
		</select>
		@if ($errors->has('sex'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('sex') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('address','Direccion', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::textarea('address',null,['class'=>'form-control','rows'=>'2','maxlength'=>215]) }}
		@if ($errors->has('address'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('phone', 'Telefono', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
			{{ Form::text('phone', null,['class'=>'form-control']) }}
			@if ($errors->has('phone'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Correo Electronico', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
			{{ Form::text('email', null,['class'=>'form-control']) }}
			@if ($errors->has('email'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<br>
	<div class="form-group">
		{{ Form::label('photo', 'Foto de perfil',['class'=>'control-label col-md-4 col-sm-4']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
			{{ Form::file('photo', ['class'=>'form-control', 'id' => 'employee-photo', 'accept' => 'image/png,image/jpeg,image/jpg']) }}
			<small>Opcional. Solo el cargo <strong>Alcalde Municipal</strong> guarda fotografía real.<br>
			Para el resto se asigna automáticamente el icono según el sexo (ruta en BD).<br>
			Formatos JPG, PNG · máximo 1MB.</small>
			<div id="default-avatar-preview" style="margin-top: 12px;">
				<div style="display: inline-block; text-align: center; margin-right: 16px;">
					<img src="{{ asset('server/imagenes/funcionarios/default-male.png') }}"
						alt="Icono hombre"
						id="preview-male"
						style="width: 72px; height: 72px; border-radius: 50%; border: 3px solid transparent; opacity: 0.45;">
					<div><small>Hombre</small></div>
				</div>
				<div style="display: inline-block; text-align: center;">
					<img src="{{ asset('server/imagenes/funcionarios/default-female.png') }}"
						alt="Icono mujer"
						id="preview-female"
						style="width: 72px; height: 72px; border-radius: 50%; border: 3px solid transparent; opacity: 0.45;">
					<div><small>Mujer</small></div>
				</div>
			</div>
			@if ($errors->has('photo'))
				<span class="error" role="alert">
					<strong>{{ $errors->first('photo') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>

<script>
(function () {
	var sexSelect = document.querySelector('select[name="sex"]');
	var male = document.getElementById('preview-male');
	var female = document.getElementById('preview-female');

	function highlightDefaultAvatar() {
		if (!male || !female || !sexSelect) return;
		var sex = sexSelect.value;
		male.style.opacity = sex === 'Masculino' ? '1' : '0.45';
		male.style.borderColor = sex === 'Masculino' ? '#212121' : 'transparent';
		female.style.opacity = sex === 'Femenino' ? '1' : '0.45';
		female.style.borderColor = sex === 'Femenino' ? '#212121' : 'transparent';
	}

	if (sexSelect) {
		sexSelect.addEventListener('change', highlightDefaultAvatar);
		highlightDefaultAvatar();
	}
})();
</script>

<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4 col-xs-12">Tipo de Empleado</label>
		<div class="col-md-8 col-sm-8 col-xs-12">
			<select class="form-control" name="type_employee">
				<option value="" selected="" hidden="">Seleccione el tipo</option>
				<option value="Autoridad"@if(old('type_employee')=='Autoridad'){{ 'selected' }}@endif>Autoridad</option>
				<option value="Normal"@if(old('type_employee')=='Normal'){{ 'selected' }}@endif>Normal</option>
			</select>
			@if ($errors->has('type_employee'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('type_employee') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('level_id','Nivel del Empleado', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('level_id',$levels, null,['class'=>'form-control','placeholder'=>'elija su nivel']) }}
		@if ($errors->has('level_id'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('level_id') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('charge_id','Cargo del Empleado', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('charge_id',$charges, null,['class'=>'form-control','placeholder'=>'elija el cargo']) }}
		@if ($errors->has('charge_id'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('charge_id') }}</strong>
            </span>
        @endif
		</div>
	</div>
	{{-- <div class="form-group">
		{{ Form::label('salarie_id','Salario', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('salarie_id',$salaries, null,['class'=>'form-control','placeholder'=>'Escoger su Salario']) }}
		@if ($errors->has('salarie_id'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('salarie_id') }}</strong>
            </span>
        @endif
		</div>
	</div> --}}
</div>				

<div class="clearfix"></div>
<div class="ln_solid"></div>

<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
		<a href="{{ route('employees.index') }}" class="btn btn-primary">Cancelar</a>
		{{ Form::submit('Guardar',['class'=>'btn btn-success']) }}
	</div>
</div>