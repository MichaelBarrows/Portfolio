@extends('layouts.master')


@section('content')
<section class="landing" id="landing">
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

<section class="about" id="about">
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
                    <p>Grade: <span class="bold">{{ $edu->grade }}</span></p>
                    <p>{{ $edu->description }}</p>
                    @if(isset($edu->project_title))
                    <p>Research Project: {{ $edu->project_title }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<section class="projects" id="projects">
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

            <div class="desktop-4 mobile-12 project-card grid" data-tech-stack="@foreach($project->tech_stack as $tech){{ $tech->identifier }} @endforeach" id="{{ $project->id }}">
            @endif
                <h3 class="all-12">{{ $project->name }}</h3>
                @if(isset($project->image))
                <img class="all-12" src="{{ asset('img/' . $project->image) }}" alt="{{ $project->name }}">
                @elseif(isset($project->text_logo))
                <div class="not-img all-12">
                    <div class="text">
                        <p>{{ $project->text_logo }}</p>
                    </div>
                </div>
                @elseif(isset($project->fa_icon_logo))
                <div class="not-img all-12">
                    <div class="text">
                        <p><i class="fas {{ $project->fa_icon_logo }}"></i></p>
                    </div>
                </div>
                @else
                <div class="not-img all-12">
                    <div class="text">
                        <p><i class="fas fa-code"></i></p>
                    </div>
                </div>
                @endif
                @if($project->short_description != "")
                <p class="short-description all-12">{{ $project->short_description }}</p>
                @endif
                <div class="link all-12">
                    <p><a href="{{ route('project.show', ['project' => $project->pretty_url]) }}">View Project</a></p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<section class="contact" id="contact">
    <div class="grid-container grid">
        <div class="desktop-12 mobile-12">
            <h2>Contact Me</h2>
        </div>

    @foreach (['success', 'error'] as $msg)
    @if(Session::has($msg))
    <div class="desktop-12 mobile-12 flash-message {{ $msg }}">
        <p class="{{ $msg }}">{{ Session::get($msg) }}</p>
    </div>
    @endif
    @endforeach

        {!! Form::open(['route' => 'contact.store', 'class' => 'contact-form grid desktop-12 mobile-12']) !!}
        <div class="mobile-12 desktop-4">
            {!! Form::text('name', '', ['placeholder' => 'Name']) !!}
        </div>
        <div class="mobile-12 desktop-4">
            {!! Form::email('email_address', '', ['placeholder' => 'E-Mail Address']) !!}
        </div>
        <div class="mobile-12 desktop-4">
            {!! Form::text('phone_number', '', ['placeholder' => 'Phone Number']) !!}
        </div>
        <div class="mobile-12 desktop-12">
            {!! Form::textarea('message', '', ['placeholder' => 'Your Message', 'class' => 'message']) !!}
        </div>
        <div class="mobile-12 desktop-6">
            {!! Form::reset('Reset Form') !!}
        </div>
        <div class="mobile-12 desktop-6">
            {!! Form::submit('Send Message') !!}
        </div>
        {!! Form::close() !!}
    </div>
</section>

@endsection
