<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{{ Form::label('salcat_id','Categoria', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('salcat_id',$salcats, null,['class'=>'form-control','placeholder'=>'elija el cargo']) }}
		@if ($errors->has('salcat_id'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('salcat_id') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('clase_id','Clase', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::select('clase_id',$clases, null,['class'=>'form-control','placeholder'=>'elija su salario']) }}
		@if ($errors->has('clase_id'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('clase_id') }}</strong>
            </span>
        @endif
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('level_salary','Nivel Salarial', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::text('level_salary',null,['class'=>'form-control']) }}
		@if ($errors->has('level_salary'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('level_salary') }}</strong>
            </span>
        @endif
		</div>
	</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{{ Form::label('denomination','Denominacion', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::text('denomination',null,['class'=>'form-control']) }}
		@if ($errors->has('denomination')) 
            <span class="error" role="alert">
                <strong>{{ $errors->first('denomination') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('nro_item','Numero de Items', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
		{{ Form::text('nro_item',null,['class'=>'form-control','id'=>'items','onkeyUp'=>'calcular(1)']) }}
		@if ($errors->has('nro_item'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('nro_item') }}</strong>
            </span>
        @endif
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('salary_monthly', 'Salario Mensual', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
			{{ Form::text('salary_monthly', null,['class'=>'form-control','id'=>'salary','onkeyUp'=>'calcular(1)']) }}
			@if ($errors->has('salary_monthly'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('salary_monthly') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::hidden('salary_total', 'Salario Total', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
		<div class="col-md-8 col-sm-8 col-xs-12">
			{{ Form::hidden('salary_total', null,['class'=>'form-control','id'=>'total']) }}
			@if ($errors->has('salary_total'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('salary_total') }}</strong>
            </span>
        @endif
		</div>
	</div>
</div>				

<div class="clearfix"></div>
<div class="ln_solid"></div>

<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
		<a href="{{ route('salaries.index') }}" class="btn btn-primary">Cancelar</a>
		{{ Form::submit('Guardar',['class'=>'btn btn-success','id'=>'guardar']) }}
	</div>
</div>

@section('script')
{{-- <script type="text/javascript" src="{{ asset('server/vendors/jquery/dist/jquery.min.js') }}"></script> --}}
<script>
	$(document).ready(function () {
        $("#guardar").click(function (e) {
            var mat = $("#items").val();
            var price = $("#salary").val();
            
            var total = mat * price;
            $("#total").val(total);
        });
    });
</script>
@endsection