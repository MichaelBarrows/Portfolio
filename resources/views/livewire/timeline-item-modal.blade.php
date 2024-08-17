<x-modal-layout>
    <x-slot name="title">{{ $type == 'edu' ? 'Education' : 'Employment' }} Details</x-slot:name>
    <div class="p-3 text-left">
        <div>
            <div class="mb-2 md:mb-0 mr-2 grid gap-5 grid-cols-5 items-center">
                @if($image)
                    <img src="{{ $image }}" alt="{{ $company }} logo" class="max-w-full">
                @else
                    <div class="text-center">
                        <i class="fas fa-{{ $type === 'edu' ? 'mortar-board' : 'briefcase' }} block text-7xl text-pacific-blue-600 py-5"></i>
                    </div>
                @endif
                <div class="col-span-4 text-pacific-blue-600">
                    <h1 class="text-2xl pb-2 font-semibold">
                        {{ $title }}
                        @if ($endDate == 'Present')
                            <span class="bg-emerald-500 text-white text-sm font-semibold rounded ml-2 px-2 py-1">Current</span>
                        @endif
                    </h1>
                    <h2 class="text-lg pb-2">{{ $company }}</h2>
                    <p class="text-black pb-2">{{ $startDate }} - {{ $endDate }}</p>
                    <div>
                        @foreach ($techStack as $tech)
                            @if(is_array($tech))
                                <x-tag>{{ $tech['name'] }}</x-tag>
                            @else
                                <x-tag class="tag">{{ $tech->getName() }}</x-tag>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-2 md:m-2 content">
            {!! $description !!}
        </div>
    </div>
</x-modal-layout>
