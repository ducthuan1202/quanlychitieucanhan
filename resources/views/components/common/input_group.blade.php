@props([
    'name', 
    'value' => null,
    'disabled' => false,
    'type' => 'text', 
    'title' => null
    ])

@php
    $inputAttr = [
        'class' => Utils::inputClass($errors, $name), 
        'disabled' => !!$disabled,
    ];
@endphp

<div class="form-group mt-3">
    {!! Form::label($name, $title) !!}

    @if ($type === 'email')
        {!! Form::email($name, $value, $inputAttr) !!}
    @elseif ($type === 'password')
        {!! Form::password($name, $inputAttr) !!}
    @else
        {!! Form::text($name, $value, $inputAttr) !!}
    @endif

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
