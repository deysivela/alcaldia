<div class="col-md-6 col-sm-6 col-xs-12">

{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
    <label class="control-label col-md-4 col-sm-4 col-xs-12">Categoria</label>
    <div class="col-md-8 col-sm-8 col-xs-12">
      <select class="form-control" name="categorie">
        <option value="" selected="" hidden="">Seleccionar una Categoria</option>
        <option value="IMPORTANTES">IMPORTANTES</option>
        <option value="RESOLUCIONES MUNICIPALES" disabled="">RESOLUCIONES MUNICIPALES</option>
        <option value="RESOLUCIONES MUNICIPALES ADMINISTRATIVOS" disabled="">RESOLUCIONES MUNICIPALES ADMINISTRATIVOS</option>
        <option value="DECRETOS EDILES" disabled="">DECRETOS EDILES</option>
        <option value="INFORMES DE TRANSPARENCIA" disabled="">INFORMES DE TRANSPARENCIA</option>
        <option value="INFORMES DE AUDITORIA" disabled="">INFORMES DE AUDITORIA</option>
        <option value="INFORMES DE GESTION" disabled="">INFORMES DE GESTION</option>
      </select>
       @if ($errors->has('categorie'))
        <span class="error" role="alert">
            <strong>{{ $errors->first('categorie') }}</strong>
        </span>
    @endif
    </div>
</div>


<div class="form-group">
    {{ Form::label('name_document','Nombre del Documento', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
    <div class="col-md-8 col-sm-8 col-xs-12">
    {{ Form::text('name_document',null,['class'=>'form-control']) }}
    @if ($errors->has('name_document'))
        <span class="error" role="alert">
            <strong>{{ $errors->first('name_document') }}</strong>
        </span>
    @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('data_document','Datos del Documento', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
    <div class="col-md-8 col-sm-8 col-xs-12">
    {{ Form::text('data_document',null,['class'=>'form-control']) }}
    @if ($errors->has('data_document'))
        <span class="error" role="alert">
            <strong>{{ $errors->first('data_document') }}</strong>
        </span>
    @endif
    </div>
</div>
{{-- <div class="form-group">
    {{ Form::label('description','Descripcion', ['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
    <div class="col-md-8 col-sm-8 col-xs-12">
    {{ Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Ingrese Contenido Resaltante','rows'=>'6','maxlength'=>500]) }}
    @if ($errors->has('description'))
        <span class="error" role="alert">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
    </div>
</div> --}}
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        @include('serve.partials.date-input', [
            'name' => 'date_creation',
            'label' => 'Fecha de Publicacion',
            'value' => null,
        ])
    </div>
    {{-- <br>
    <div class="form-group">
        {{ Form::label('photo', 'Imagen (Opcional)',['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
        {{ Form::file('photo') }}
        <small>Formatos Permitido Unicamente JPG,PNG MAXIMO 1MB</small><br>
        @if ($errors->has('photo'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('photo') }}</strong>
            </span>
        @endif
    </div> --}}
    <br>
    <div class="form-group">
        {{ Form::label('file', 'Subir Archivo',['class'=>'control-label col-md-4 col-sm-4 col-xs-12']) }}
        {{ Form::file('file') }}
        <small>Formatos Permitido Unicamente PDF MAXIMO 60MB</small><br>
        @if ($errors->has('file'))
            <span class="error" role="alert">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group" hidden="">
        <label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name="publish" value="0" class="form-control">
        </div>
    </div>
</div>              

<div class="clearfix"></div>
<div class="ln_solid"></div>

<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
        <a href="{{ route('important.index') }}" class="btn btn-primary">Cancelar</a>
        {{ Form::submit('Guardar',['class'=>'btn btn-success']) }}
    </div>
</div>