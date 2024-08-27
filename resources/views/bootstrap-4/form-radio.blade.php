<div class="{{ $customControl ? 'custom-control custom-radio' : 'form-check' }}  {{ $wrapperClass }}">
    <input {!! $attributes->merge(['class' => ($customControl ? 'custom-control-input' : 'form-check-input ') . ($hasError($name) ? 'is-invalid' : '')]) !!}
        type="radio"

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $dottedNotationName() }}"
        @endif

        name="{{ $name }}"
        value="{{ $value }}"

        @if($checked)
            checked="checked"
        @endif

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif
    />

   <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" class="{{ $customControl ? 'custom-control-label' : 'form-check-label' }}" />

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
