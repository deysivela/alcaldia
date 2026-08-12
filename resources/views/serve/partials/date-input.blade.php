{{--
  Uso:
  @include('serve.partials.date-input', [
    'name' => 'date_creation',
    'label' => 'Fecha de Publicacion',
    'value' => isset($document) ? $document->date_creation : null,
  ])
--}}
@php
	$fieldName = $name ?? 'date_creation';
	$fieldLabel = $label ?? 'Fecha';
	$labelClass = $labelClass ?? 'control-label col-md-4 col-sm-4 col-xs-12';
	$wrapClass = $wrapClass ?? 'col-md-8 col-sm-8 col-xs-12';
	$rawValue = old($fieldName, $value ?? null);
	$formatted = null;
	if (!empty($rawValue)) {
		try {
			$formatted = \Carbon\Carbon::parse($rawValue)->format('Y-m-d');
		} catch (\Exception $e) {
			$formatted = null;
		}
	}
@endphp
@if($labelClass !== false)
	{{ Form::label($fieldName, $fieldLabel, $labelClass !== '' ? ['class' => $labelClass] : []) }}
@endif
@if($wrapClass !== false)
<div class="{{ $wrapClass }}">
@endif
	{{ Form::date($fieldName, $formatted, ['class' => 'form-control gam-date-native']) }}
	@if ($errors->has($fieldName))
		<span class="error" role="alert">
			<strong>{{ $errors->first($fieldName) }}</strong>
		</span>
	@endif
@if($wrapClass !== false)
</div>
@endif
