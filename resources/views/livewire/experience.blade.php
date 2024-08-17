
<div>
    <h2 id="experience" class="text-3xl text-gradient text-center font-semibold text-pacific-blue-600">My Experience</h2>
    <div class="max-w-[95%] md:max-w-7xl mx-auto mt-5 space-y-2 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-slate-300 mb-8">
        @foreach ($experiences as $experience)
            <x-timeline-item
                :id="$experience->getKey()"
                :end-date="$experience->end_date"
                :organisation="$experience->organisation"
                :position="$experience->position"
                :type="$experience->type"
                :start-date="$experience->start_date"
                :tech-stack="$experience->tech_stack"
                :description="$experience->description"
                :image="$experience->image"
            />
        @endforeach
    </div>
</div>
