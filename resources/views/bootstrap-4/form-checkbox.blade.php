<div class="form-check {{ $wrapperClass }}">
    <input {!! $attributes->merge(['class' => 'form-check-input ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
        type="checkbox"
        value="{{ $value }}"

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $dottedNotationName() }}"
        @endif

        name="{{ $name }}"

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif

        @if($checked)
            checked="checked"
        @endif
    />

    <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" class="form-check-label" />

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
