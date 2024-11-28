@props([
    'name', 
    'data' => [], 
    'value' => null,
    'type' => 'text', 
    'title' => null,
    'disabled' => false,
])

@php
    $inputAttr = [
        'class' => Utils::inputClass($errors, $name),
        'disabled' => !!$disabled,
    ];
@endphp

<div class="form-group mt-3">
    {!! Form::label($name, $title) !!}

    {!! Form::select($name, $data, $value, $inputAttr) !!}
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

</div>
