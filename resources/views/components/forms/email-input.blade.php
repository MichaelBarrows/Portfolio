<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <input
        {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}"
        class="border-pacific-blue-600 border-2 rounded-md p-2 w-full shadow-lg"
        type="email"
    />
</x-dynamic-component>
