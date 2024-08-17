<div class="modal text-center bg-white rounded-lg relative">
    <div class="rounded-t-lg bg-pacific-blue-600 text-white shadow-md pb-3">
        <h2 class="modal-title text-xl pt-3 text-xl">{{ $title }}</h2>
        <span class="absolute right-1 top-2">
            <a href="#" class="text-2xl p-2 cursor-pointer fas fa-xmark" wire:click.prevent="$dispatch('closeModal')"></a>
        </span>
    </div>
    {!! $slot !!}
</div>
