@extends('layouts.master')

@section('canonical')
<link rel="canonical" href="https://michaelbarrows.com">
@endsection

@section('content')
<section id="landing">
    <div class="grid-container grid">
        <div class="all-12">
            <h2>Hi, I'm Michael, a Web Developer in Colchester, Essex!</h2>
        </div>
        <div class="small-12 medium-12 large-8 xlarge-8 large-start-2 xlarge-start-2 grid">
            <a class="link small-12 medium-12 large-4 xlarge-4" href="#about">Find out more <i class="fas fa-info-circle"></i></a>
            <a class="link small-12 medium-12 large-4 xlarge-4" href="#projects">View my work <i class="fas fa-code"></i></a>
            <a class="link small-12 medium-12 large-4 xlarge-4" href="#contact">Get in touch <i class="fas fa-envelope"></i></a>
        </div>
        <div class="chevron">
            <a href="#about"><span class="fa fa-chevron-down"></span></a>
        </div>
    </div>
</section>

<section id="about">
    <div class="grid-container grid">
        <div class="all-12">
            <h2>About Me</h2>
        </div>
        <div class="all-12 grid img-text-container">
            <div class="small-12 medium-12 large-3 xlarge-3">
                <img class="mb" src="{{ asset('img/michaelbarrows.jpeg') }}" alt="Picture of me">
            </div>
            <div class="small-12 medium-12 large-9 xlarge-9 semi-transparent-light-grey about-text slight-rounding">
                <p>I'm Michael, a web developer (back-end/full-stack) in Colchester with 4 years of experience specifically in web design and development.</p>
                <p>I've recently completed a research master's at the University of Portsmouth in which I explored automated labelling and machine learning for sentiment and emotion. Before that, I studied a master of computing degree at Edge Hill University in web design and development.</p>
                <p>Within the web development field, my interests are mainly in back-end development (PHP, Laravel, SQL).</p>
                <p>I am currently looking for a back-end or full-stack developer role in Colchester, Ipswich, Chelmsford, London or remote. I am also open to freelance projects</p>
                <p>Want to know more? <a href="#contact">Get in touch</a>.</p>
            </div>
        </div>
        <!-- Technical Skills -->
        <div class="small-12 medium-12 large-4 xlarge-4 skills align-center">
            <h3>Back-end Skills</h3>
            <p>PHP</p>
            <p>Laravel</p>
            <p>MySQL</p>
            <p>Database Design</p>
            <p>Data Normalisation</p>
            <p>Relational Databases</p>
            <p>Creating API's</p>
            <p>Python</p>
            <p>Behaviour Driven Development (BDD)</p>

        </div>
        <div class="small-12 medium-12 large-4 xlarge-4 skills align-center">
            <h3>Front-end Skills</h3>
            <p>HTML5</p>
            <p>CSS3</p>
            <p>Sass</p>
            <p>JavaScript</p>
            <p>JQuery</p>
            <p>Using API's</p>
            <p>Bootstrap</p>
            <p>Foundation</p>
            <p>JSON</p>
        </div>
        <div class="small-12 medium-12 large-4 xlarge-4 skills align-center">
            <h3>Other Skills</h3>
            <p>Git</p>
            <p>Machine Learning</p>
            <p>Numpy</p>
            <p>Pandas</p>
            <p>Scikit-Learn</p>
            <p>Automated Labelling</p>
            <p>Natural Language Processing (NLP)</p>
            <p>Natural Language Toolkit (NLTK)</p>
            <p>matplotlib</p>
        </div>
        @if(isset($education))
        <div class="all-12 grid">
            @foreach($education as $edu)
            <div class="all-12 education" id="{{ $edu->identifier }}">
                <div class="header closed">
                    <h3>{{ $edu->course_name }} <span class="small">({{ $edu->grade }})</span></h3>
                    <p>{{ $edu->institution_name }}</p>
                    <a href="#"><i class="fas fa-chevron-down"></i></a>

                </div>
                <div class="body">
                    <p>Grade: <span class="bold">{{ $edu->grade }}</span> ({{ $edu->start_date }} - {{ $edu->end_date }})</p>
                    @if(isset($edu->project_title))
                    <p><span class="bold">Research Project:</span> {{ $edu->project_title }}</p>
                    @endif
                    {!! $edu->description !!}
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
            @if($project->techStack != null)

            <div class="small-12 medium-6 large-4 xlarge-4 project-card grid" data-tech-stack="@foreach($project->techStack as $tech){{ $tech->identifier }} @endforeach" id="{{ $project->id }}">
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
                <div class="tech-stack all-12">
                @if(count($project->techStack) >= 6)
                    @for($idx = 0; $idx < 5; $idx++)
                        <p>{{ $project->techStack[$idx]->name }}</p>
                    @endfor
                    <p> + {{ count($project->techStack) - 5 }}</p>
                @else
                    @foreach($project->techStack as $tech)
                        <p>{{ $tech->name }}</p>
                    @endforeach
                @endif
                </div>
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
            <div class="text semi-transparent-blue text-centre slight-rounding">
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
@endsection
