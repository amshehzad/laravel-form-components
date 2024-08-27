<div class="mt-4">
    <label class="block">
        <x-form-label :label="$label" />

        <textarea
            @if($isWired())
                wire:model{!! $wireModifier() !!}="{{ $dottedNotationName() }}"
            @endif

            name="{{ $name }}"

            {!! $attributes->merge(['class' => 'block w-full ' . ($label ? 'mt-1' : '')]) !!}
        >@unless($isWired()){!! $value !!}@endunless</textarea>
    </label>

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
