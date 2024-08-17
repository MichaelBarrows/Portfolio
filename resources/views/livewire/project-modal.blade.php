<x-modal-layout>
    <x-slot name="title">Project Details</x-slot:name>
    <div class="p-3 text-left">
        <div>
            <div class="mb-2 md:mb-0 mr-2 grid gap-5 grid-cols-5 items-center">
                <div class="aspect-square max-w-[90%] mx-auto text-center bg-pacific-blue-600 shadow-xl rounded-full mb-2">
                    <div class="relative top-[50%] -translate-y-2/4">
                        <i class="fas {{ $icon ?? 'fa-code' }} block text-4xl p-5 text-white"></i>
                    </div>
                </div>
                <div class="col-span-4 text-pacific-blue-600">
                    <h1 class="text-2xl pb-2 font-semibold">{{ $name }}</h1>
                    <div>
                        @foreach ($techStack as $tech)
                            <span class="tag">{{ $tech->getName() }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="md:col-span-2 md:m-2 content">
            {!! $description !!}
            @if ($links->count())
                <div class="flex flex-wrap grid-cols-3 text-center gap-3">
                    @foreach ($links as $link)
                        <a
                            href="{{ $link['link'] }}"
                            target="_blank"
                            class="flex-grow text-white hover:text-pacific-blue-600 bg-pacific-blue-600 hover:bg-white border-[1px] border-pacific-blue-600 px-1 rounded-md px-2 py-1"
                        >
                            <i class="{{ $link['icon'][0] }} {{ $link['icon'][1] }} pr-1"></i>
                            {{ $link['text'] }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-modal-layout>
