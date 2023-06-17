@props(['type', 'name', 'label', 'class' => null, 'value' => null, 'attributes' => []])

<div class="mb-3">
    <label for="{{ $name }}">{{ $label }}</label>
    {!! Form::$type($name, $value ?? null, ['class' => 'form-control' . $class, $attributes]) !!}
    <span class="text-danger"></span>
</div>
