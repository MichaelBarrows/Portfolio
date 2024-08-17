<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <textarea
        {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}"
        class="text-pacific-blue-600 border-pacific-blue-600 border-2 rounded-md p-4 w-full shadow-lg"
        rows="9"
    ></textarea>
</x-dynamic-component>
