@extends('client.layouts.index')
@section('content')
<div class="static-slider3 bg-inverse">
</div>
<div class="mini-spacer">
    <h2 style="text-align: center;">Documentos Importantes</h2>
</div>
@foreach($doin as $di)
<div class="feature16 mini-spacer">
    <div class="row wrap-feature-16">
        <div class="col-lg-6 with-bg" style="background-image: url({{ asset($di->photo) }}); background-size: 60%; background-repeat: no-repeat;">
        </div>
        <div class="col-lg-6 bg-info-gradiant text-white">
            <div class="with-text">
                <h2 class="text-white font-bold">{{ $di->name_document }}</h2>
                <h2 class="text-white m-t-30 m-b-30">{{ $di->data_document }}</h2>
                <p class="op-7" style="text-align: justify;">{{ $di->description }}</p>
            </div>
            <div style="text-align: center;">
                <a class="btn btn-outline-light btn-rounded btn-md btn-arrow" data-animation="animated fadeInLeft" href="{{ asset($di->file) }}" target="__blank"> <span>Ver <i class="ti-arrow-right"></i></span> </a>
                <a class="btn btn-outline-light btn-rounded btn-md btn-arrow m-l-20" data-animation="animated fadeInRight" href="{{ asset($di->file) }}" download="{{ $di->name_document }}"> <span>Descargar <i class="ti-arrow-right"></i></span> </a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection