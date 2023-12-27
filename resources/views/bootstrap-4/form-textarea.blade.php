<div class="@if($type === 'hidden') d-none @else form-group @endif {{ $wrapperClass }}">
    <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />

    <textarea
        @if($autoresize)
            x-data="{
                    resize: () => {
                        $el.style.height = '100px';
                        $el.style.height = ($el.scrollHeight > 0 ? ($el.scrollHeight + 5) : 100) + 'px'
                    }
                }"
            x-init="resize()"
            @input="resize()"
            @focusin="resize()"
        @endif

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $dottedNotationName }}"
        @endif

        name="{{ $name }}"

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif

        {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
    >@unless($isWired()){!! $value !!}@endunless</textarea>

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
