<div
    class="p-2 p-4 rounded-md text-white shadow-xl cursor-pointer border-2 border-pacific-blue-600"
    wire:click="$dispatch('openModal', { component: 'project-modal', arguments: { id: {{ $id }} }})"
>
    <div class="grid grid-cols-1">
        <div class="aspect-square w-[20%] md:w-[35%] mx-auto text-center bg-pacific-blue-600 shadow-xl rounded-full">
            <div class="relative top-[50%] -translate-y-2/4">
                <i class="fas {{ $icon ?? 'fa-code' }} block text-4xl p-2 text-white"></i>
            </div>
        </div>
        <div class="md:col-span-3 text-center sm:text-left mt-2 md:mt-0 text-pacific-blue-600">
            <h3 title="{{ $title }}" class="text-xl pt-5 truncate text-center font-semibold">{{ $title }}</h3>
            <div class="m-2 text-center">
                @foreach($tags as $tag)
                    <x-tag>{{ $tag->getName() }}</x-tag>
                @endforeach
            </div>
        </div>
    </div>
</div>
