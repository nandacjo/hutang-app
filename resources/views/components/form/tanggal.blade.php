<div class="mb-3">
    {{ Form::label($name, $label) }}
    {!! Form::date($name, $value == 'true' ? now() : now()->addDays(7), ['class' => 'form-control']) !!}
    <span class="text-danger"></span>
</div>
