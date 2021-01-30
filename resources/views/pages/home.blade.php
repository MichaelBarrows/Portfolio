@extends('layouts.master')


@section('content')
<section class="landing">
    <div class="grid-container grid">
        <div class="desktop-12 mobile-12">
            <h2>Hi, I'm Michael, a Web Developer from Colchester, Essex!</h2>
        </div>
        <div class="desktop-12 mobile-12 grid">
            <div class="desktop-4 mobile-12 card">
                <h3><i class="fas fa-code"></i></h3>
            </div>
            <div class="desktop-4 mobile-12 card">
                <h3><i class="fas fa-palette"></i></h3>
            </div>
            <div class="desktop-4 mobile-12 card">
                <h3><i class="fas fa-code"></i></h3>
            </div>
        </div>
    </div>
</section>

<section class="about">
    <div class="grid-container grid">
        <div class="desktop-12 mobile-12">
            <h2>About Me</h2>
        </div>
        <div class="desktop-3 mobile-12">
            <img class="mb" src="{{ asset('img/michaelbarrows.jpeg') }}" alt="Picture of me">
        </div>
        <div class="desktop-9 mobile-12 semi-transparent-light-grey">
            <p>About me text</p>
            <p>About me text</p>
        </div>
        @if(isset($education))
        <div class="desktop-12 mobile-12 grid">
            @foreach($education as $edu)
            <div class="desktop-12 mobile-12 education">
                <div class="header">
                    <h3>{{ $edu->course_name }}</h3>
                    <p>{{ $edu->institution_name }}</p>

                </div>
                <div class="body">
                    <p>{{ $edu->description }}</p>
                    <p>{{ $edu->grade }}</p>
                    @foreach($edu->projects as $project)
                    <p>{{ $project->name }}</p>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<section class="projects">
    <div class="grid-container grid">
        <div class="desktop-12 mobile-12">
            <h2>Projects</h2>
        </div>
        @if(isset($projects))
        <!-- projects refine tools -->
        @if(isset($technologies))
        <div class="desktop-12 mobile-12">
            <p class="tech-filters">
                <a href="#" class="stack-filter active" data-tech-stack="all-active">All Projects</a>
                @foreach($technologies as $technology)
                <a href="#" class="stack-filter" data-tech-stack="{{ $technology->identifier }}">{{ $technology->name }}</a>
                @endforeach
            </p>
        </div>
        @endif
        <div class="desktop-12 mobile-12 grid">
            @foreach($projects as $project)
            @if($project->tech_stack != null)

            <div class="desktop-4 mobile-12 project-card" data-tech-stack="@foreach($project->tech_stack as $tech){{ $tech->identifier }} @endforeach" id="{{ $project->id }}">
            @endif
                <h3 class="all-12">{{ $project->name }}</h3>
                @if($project->image != "")
                <img src="{{ asset('img/' . $project->image) }}" alt="{{ $project->name }}">
                @else
                <div class="not-img">
                    <div class="text">
                        <p><i class="fas fa-code"></i></p>
                    </div>
                </div>
                @endif
                <p class="all-12">{{ $project->short_description }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

@endsection
