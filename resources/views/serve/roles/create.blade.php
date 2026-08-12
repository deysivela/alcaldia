@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2 style="font-size: 18px;">Registro de Rol<small></small></h2>
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
		  	<br/>
			{!! Form::open(['route'=>'roles.store', 'class'=>'form-horizontal form-label-left']) !!}

			@include('serve.roles.partials.form')

			{!! Form::close() !!}
		  </div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('server/vendors/stringtoslug/jquery.stringToSlug.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		function fallbackSlug(text) {
			return String(text || '')
				.toLowerCase()
				.normalize('NFD').replace(/[\u0300-\u036f]/g, '')
				.replace(/[^a-z0-9]+/g, '-')
				.replace(/^-+|-+$/g, '');
		}

		if ($.fn.stringToSlug) {
			$("#name, #slug").stringToSlug({
				callback: function(text){
					$("#slug").val(text);
				}
			});
		} else {
			$("#name").on("keyup change", function(){
				$("#slug").val(fallbackSlug($(this).val()));
			});
		}
	});
</script>
@endsection