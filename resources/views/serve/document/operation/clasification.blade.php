@extends('serve.layouts.index')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2 style="font-size: 18px;">Panel de Clasificacion<small></small></h2>
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
		    <div class="row top_tiles">
	    	<h1 style="text-align: center;"><small>Clasificacion de Documentos Por Categorias</small></h1>
	    	<hr>
	        <a href="{{ route('clasifications_leymunicipal') }}">
		      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
		        <div class="tile-stats">
		          <div class="icon"><i class="fa fa-check-square-o"></i></div>
		          <div class="count"><span class="label label-default">{{ $lm->count() }}</span></div>
		          <br>
		          <h3>LEYES MUNICIPALES</h3>
		          <br>
		        </div>
		      </div>
		      </a>
		      <a href="{{ route('clasifications_resomunicipal') }}">
		      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
		        <div class="tile-stats">
		          <div class="icon"><i class="fa fa-check-square-o"></i></div>
		          <div class="count"><span class="label label-default">{{ $rm->count() }}</span></div>
		          <br>
		          <h3>RESOLUCIONES MUN.</h3>
		          <br>
		        </div>
		      </div>
		      </a>
		      <a href="{{ route('clasifications_resomuniadmi') }}">
		      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
		        <div class="tile-stats">
		          <div class="icon"><i class="fa fa-check-square-o"></i></div>
		          <div class="count"><span class="label label-default">{{ $rma->count() }}</span></div>
		          <br>
		          <h3>RESOLUCIONES AD. MUN.</h3>
		          <br>
		        </div>
		      </div>
		      </a>
		      <a href="{{ route('clasifications_deedi') }}">
		      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
		        <div class="tile-stats">
		          <div class="icon"><i class="fa fa-check-square-o"></i></div>
		          <div class="count"><span class="label label-default">{{ $de->count() }}</span></div>
		          <br>
		          <h3>DECRETOS EDILES</h3>
		          <br>
		        </div>
		      </div>
		      </a>
		      <a href="{{ route('clasifications_infotrans') }}">
		      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
		        <div class="tile-stats">
		          <div class="icon"><i class="fa fa-check-square-o"></i></div>
		          <div class="count"><span class="label label-default">{{ $it->count() }}</span></div>
		          <br>
		          <h3>TRANSPARENCIA</h3>
		          <br>
		        </div>
		      </div>
		      </a>
		      <a href="{{ route('clasifications_infoaud') }}">
		      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
		        <div class="tile-stats">
		          <div class="icon"><i class="fa fa-check-square-o"></i></div>
		          <div class="count"><span class="label label-default">{{ $ia->count() }}</span></div>
		          <br>
		          <h3>INFORMES AUDITORIA</h3>
		          <br>
		        </div>
		      </div>
		      </a>
		      <a href="{{ route('clasifications_infoges') }}">
		      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
		        <div class="tile-stats">
		          <div class="icon"><i class="fa fa-check-square-o"></i></div>
		          <div class="count"><span class="label label-default">{{ $ig->count() }}</span></div>
		          <br>
		          <h3>INFORMES GESTION</h3>
		          <br>
		        </div>
		      </div>
		      </a>
		    </div>
		  </div>
		</div>
	</div>
</div>
@endsection