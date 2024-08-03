
<div class="w-full">
    @if(! empty($track['track']))
        <div class="grid min-h-[100px] grid-cols-4 p-4 rounded-md">
            <img
                src="{{ $track['album_image'] }}"
                alt="{{ $track['track'] }} by {{ $track['artist'] }}"
                class="aspect-square max-w-full"
            />
            <div class="grid col-span-3">
                <h1
                    title="{{ $track['track'] }}"
                    class="font-semibold pl-3 text-lg leading-snug mt-0 text-ellipsis whitespace-nowrap truncate"
                >
                    {{ $track['track'] }}
                </h1>
                <h2
                    title="{{ $track['artist'] }}"
                    class="mt-2 pl-3 leading-loose truncate"
                >
                    {{ collect($track['artists'])->map(fn ($artist) => $artist['name'])->implode(', ') }}
                </h2>
                <h3
                    title="{{ $track['album'] }}"
                    class="text-sm m-0 pl-3 leading-loose truncate"
                >
                    {{ $track['album'] }}
                </h3>
            </div>
        </div>
    @endif
</div>
