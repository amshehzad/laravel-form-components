@if($floating) <div class="form-floating"> @endif

    @if(!$floating)
        <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />
    @endif

    <textarea
        @if($autoresize)
            x-data="{
                    resize: () => {
                        $el.style.height = '100px';
                        $el.style.height = ($el.scrollHeight > 0 ? $el.scrollHeight : 100) + 'px'
                    }
                }"
            x-init="resize()"
            @input="resize()"
            @focusin="resize()"
        @endif

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $dottedNotationName() }}"
        @endif

        name="{{ $name }}"

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif

        {{--  Placeholder is required as of writing  --}}
        @if($floating && !$attributes->get('placeholder'))
            placeholder="&nbsp;"
        @endif

        {!! $attributes->merge(['class' => 'form-control' . ($hasError($name) ? ' is-invalid' : '')]) !!}
    >@unless($isWired()){!! $value !!}@endunless</textarea>

    @if($floating)
        <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />
    @endif

@if($floating) </div> @endif

{!! $help ?? null !!}

@if($hasErrorAndShow($name))
    <x-form-errors :name="$name" />
@endif
