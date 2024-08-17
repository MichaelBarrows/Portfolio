<div class="max-w-[95%] md:max-w-7xl mx-auto mb-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    <h2 id="projects" class="md:col-span-2 lg:col-span-4 text-3xl text-gradient text-center font-semibold text-pacific-blue-600">Projects</h2>
    @foreach($projects as $project)
        <x-project-card
            :id="$project->getKey()"
            :icon="$project->fa_icon_logo"
            :title="$project->name"
            :tags="$project->tech_stack"
        />
    @endforeach
</div>
