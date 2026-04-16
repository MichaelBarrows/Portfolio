
<div class="max-w-[95%] md:max-w-7xl mx-auto  grid lg:grid-cols-3">
    <h2 id="experience" class="text-4xl text-gradient font-medium text-pacific-blue-600">Experience &amp; <br />Education</h2>
    <div class="m-2">
        <h3 class="text-2xl mb-5">
            <i class="fa fa-briefcase mr-2 text-pacific-blue-600"></i>
            <span class="font-medium">Experience</span>
        </h3>
        @foreach ($this->employment as $experience)
            <div class="relative flex gap-5">
                <div class="relative flex gap-5">
                    <div class="flex flex-col items-center">
                        <div class="relative flex items-center justify-center mt-1">
                            <span class="absolute inline-flex w-3 h-3 lg:w-4 lg:h-4 rounded-full bg-pacific-blue-600 {{ $experience->end_date == 'Present' ? 'animate-ping' : '' }}"></span>
                            <div class="w-3 h-3 lg:w-4 lg:h-4 rounded-full bg-pacific-blue-600"></div>
                        </div>
                        <div class=" {{ $loop->last ? 'hidden' : '' }} w-px flex-1 bg-pacific-blue-600 mt-1">&nbsp;</div>
                    </div>
                    <div class="pb-8 min-w-0 text-left">
                        <p class="text-sm font-medium text-pacific-blue-600 mb-0.5">{{ $experience->start_date }} - {{ $experience->end_date }}</p>
                        <h3 class="text-lg font-semibold leading-snug">{{ $experience->position }}</h3>
                        <div class="flex flex-wrap items-center gap-1.5 text-sm mt-0.5">
                            <span class="font-medium text-slate-500">{{ $experience->organisation }}</span>
                        </div>
                        <div class="flex gap-1 text-sm">
                            @foreach ($experience->tech_stack as $tech)
                                <span class="bg-pacific-blue-600 text-white py-0.5 px-1 rounded-sm">
                                    {{ $tech->isLong() ? $tech->getShortName() : $tech->getName() }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="m-2">
        <h3 class="text-2xl mb-5">
            <i class="fa fa-graduation-cap mr-1 text-pacific-blue-600"></i>
            <span class="font-medium">Education</span>
        </h3>
        @foreach ($this->education as $experience)
            <div class="relative flex gap-5">
                <div class="relative flex gap-5">
                    <div class="flex flex-col items-center">
                        <div class="relative flex items-center justify-center mt-1">
                            <span class="absolute inline-flex w-3 h-3 lg:w-4 lg:h-4 rounded-full bg-pacific-blue-600"></span>
                            <div class="w-3 h-3 lg:w-4 lg:h-4 rounded-full bg-pacific-blue-600 "></div>
                        </div>
                        <div class=" {{ $loop->last ? 'hidden' : '' }} w-px flex-1 bg-pacific-blue-400 mt-1">&nbsp;</div>
                    </div>
                    <div class="pb-8 min-w-0 text-left">
                        <p class="text-sm font-medium text-pacific-blue-600 mb-0.5">{{ $experience->start_date }} - {{ $experience->end_date }}</p>
                        <h3 class="text-lg font-semibold leading-snug">{{ $experience->position }}</h3>
                        <div class="flex flex-wrap items-center gap-1.5 text-foreground/70 text-sm mt-0.5">
                            <span class="font-medium text-slate-500">{{ $experience->organisation }}</span>
                        </div>
                        <div class="flex gap-1 text-sm">
                            @foreach ($experience->tech_stack as $tech)
                                <span class="bg-pacific-blue-600 text-white py-0.5 px-1 rounded-sm">
                                    {{ $tech->isLong() ? $tech->getShortName() : $tech->getName() }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
