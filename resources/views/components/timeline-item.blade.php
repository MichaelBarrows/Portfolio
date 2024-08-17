<div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
    <div class="{{ $endDate == 'Present' ? 'bg-emerald-500' : 'gradient'}} flex items-center justify-center w-10 h-10 rounded-full border border-white text-white shadow-xl shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
        <i class="text-xl fas fa-{{ $type === 'edu' ? 'mortar-board' : 'briefcase' }}"></i>
    </div>
    <div
        class="'w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white rounded border-2 shadow-xl cursor-pointer m-1 md:m-0 {{ $endDate == 'Present' ? 'border-emerald-500' : 'border-pacific-blue-600' }} {{ ! empty($properties['image']) ? 'p-4 pl-2' : ' p-4' }}"
        wire:click="$dispatch('openModal', { component: 'timeline-item-modal', arguments: { type: '{{ $type }}', id: {{ $id }} }})"
    >
        <div class="grid grid-cols-5 items-center justify-center relative">
            @if ($endDate == 'Present')
                <p class="bg-emerald-500 absolute -top-3 -right-3 text-white text-sm font-semibold rounded px-2 py-1">Current</p>
            @endif
            @if (! empty($image))
                <img src="{{ $image }}" class="max-w-full" alt="{{ $organisation }} logo"/>
            @else
                <div class="text-center max-w-full logo">
                    <i class="fas fa-{{ $type === 'edu' ? 'mortar-board' : 'briefcase' }} block text-7xl text-pacific-blue-600 py-5 pr-4"></i>
                </div>
            @endif
            <div class="col-span-4 pl-3">
                <div class="col-span-4 flex items-center justify-between space-x-2 mb-1">
                    <div class="font-bold text-slate-900">{{ $position }}</div>
                    <p class="block md:hidden text-pacific-blue-700">{{ $startDate }}</p>
                </div>
                <div class="text-pacific-blue-600 font-medium">{{ $organisation }}</div>
                <div class="mt-2" v-if="techStack">
                    @foreach($techStack as $tag)
                        @if (is_array($tag))
                            <span class="tag">{{ $tag['name'] }}</span>
                        @else
                            <span class="tag">{{ $tag->getName() }}</span>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="hidden md:block absolute md:group-odd:right-[54%] md:group-even:left-[54%] text-pacific-blue-700 font-semi-bold text-xl">
        {{ $startDate }}
    </div>
</div>
