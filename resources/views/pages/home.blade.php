@extends('layouts.master')


@section('content')
<section id="landing">
    <div class="grid-container grid">
        <div class="all-12">
            <h2>Hi, I'm Michael, a Web Developer from Colchester, Essex!</h2>
        </div>
        <div class="all-12 grid">
            <div class="small-12 medium-6 large-4 xlarge-4 card">
                <h3><i class="fas fa-code"></i></h3>
            </div>
            <div class="small-12 medium-6 large-4 xlarge-4 card">
                <h3><i class="fas fa-palette"></i></h3>
            </div>
            <div class="small-12 medium-6 large-4 xlarge-4 medium-start-3 card">
                <h3><i class="fas fa-code"></i></h3>
            </div>
        </div>
    </div>
</section>

<section id="about">
    <div class="grid-container grid">
        <div class="all-12">
            <h2>About Me</h2>
        </div>
        <div class="small-12 medium-4 large-3 xlarge-3">
            <img class="mb" src="{{ asset('img/michaelbarrows.jpeg') }}" alt="Picture of me">
        </div>
        <div class="small-12 medium-8 large-9 xlarge-9 semi-transparent-light-grey">
            <p>About me text</p>
            <p>About me text</p>
        </div>
        @if(isset($education))
        <div class="all-12 grid">
            @foreach($education as $edu)
            <div class="all-12 education">
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

<section id="projects">
    <div class="grid-container grid">
        <div class="all-12">
            <h2>Projects</h2>
        </div>
        @if(isset($projects))
        <!-- projects refine tools -->
        @if(isset($technologies))
        <div class="all-12">
            <p class="tech-filters">
                <a href="#" class="stack-filter active" data-tech-stack="all-active">All Projects</a>
                @foreach($technologies as $technology)
                <a href="#" class="stack-filter" data-tech-stack="{{ $technology->identifier }}">{{ $technology->name }}</a>
                @endforeach
            </p>
        </div>
        @endif
        <div class="all-12 grid">
            @foreach($projects as $project)
            @if($project->tech_stack != null)

            <div class="small-12 medium-6 large-4 xlarge-4 project-card grid" data-tech-stack="@foreach($project->tech_stack as $tech){{ $tech->identifier }} @endforeach" id="{{ $project->id }}">
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

<section id="contact">
    <div class="grid-container grid">
        <div class="all-12">
            <h2>Contact Me</h2>
        </div>
        <div class="all-12">
            <div class="text semi-transparent-blue text-centre">
                <p>Got a project you'd like some help with or a vacancy you think I'd be a good fit for? Get in touch!</p>
                <p>If you'd rather email me, my email address is <a href="mailto:contact@michaelbarrows.com">contact@michaelbarrows.com</a>.</p>
            </div>
        </div>

    @foreach (['success', 'error'] as $msg)
    @if(Session::has($msg))
    <div class="all-12 flash-message {{ $msg }}">
        <p class="{{ $msg }}">{{ Session::get($msg) }}</p>
    </div>
    @endif
    @endforeach
    @if ($errors->any())
        @foreach ($errors->all() as $error)

        <div class="all-12 flash-message error">
            <p class="error">{{ $error }}</p>
        </div>
        @endforeach
    @endif
        {!! Form::open(['route' => 'contact.store', 'class' => 'contact-form grid all-12']) !!}
        <div class="small-12 medium-12 large-4 xlarge-4">
            {!! Form::text('name', '', ['placeholder' => 'Name', 'required']) !!}
        </div>
        <div class="small-12 medium-12 large-4 xlarge-4">
            {!! Form::email('email_address', '', ['placeholder' => 'E-Mail Address', 'required']) !!}
        </div>
        <div class="small-12 medium-12 large-4 xlarge-4">
            {!! Form::text('phone_number', '', ['placeholder' => 'Phone Number', 'required']) !!}
        </div>
        <div class="small-12 medium-12 large-12 xlarge-12">
            {!! Form::textarea('message', '', ['placeholder' => 'Your Message', 'class' => 'message', 'required']) !!}
        </div>
        <div class="small-12 medium-6 large-6 xlarge-6">
            {!! Form::reset('Reset Form') !!}
        </div>
        <div class="small-12 medium-6 large-6 xlarge-6">
            {!! Form::submit('Send Message') !!}
        </div>
        {!! Form::close() !!}
    </div>
</section>

<footer>
    <div class="grid-container grid">
        <p class="all-12">&copy; Michael Barrows {{ date('Y') }}</p>
    </div>
</footer>

@endsection
