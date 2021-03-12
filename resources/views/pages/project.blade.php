@extends('layouts.master')

@if(isset($project))
    @section('canonical')
    <link rel="canonical" href="https://michaelbarrows.com/project/{{ $project->pretty_url }}">
    @endsection

    @section('title')
    {{ $project->name }} |
    @endsection
@endif


@section('content')
<section id="project">
    <div class="grid-container grid">
        @if(isset($project))
        <div class="all-12">
            <h2>{{ $project->name}}</h2>
        </div>
        <div class="all-12 grid">

            <div class="small-12 medium-12 large-3 xlarge-3 side slight-rounding grid">
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
                @if($project->techStack != null)
                <div class="all-12 tech-stack">
                    @foreach($project->techStack as $tech)
                    <p>{{ $tech->name }}</p>
                    @endforeach
                </div>
                @endif

                @if ($project->projectImages->count() != 0)
                    <a class="all-12" href="/images/{{ $project->projectImages[0]->id }}">View Images ({{ $project->projectImages->count() }}) <i class="fas fa-image"></i></a>
                @endif
                @if($project->projectLinks->count() != 0)
                    @foreach($project->projectLinks as $link)
                        <a class="all-12" href="{{ $link->link }}" target="_blank">{{ $link->text }} <i class="{{ $link->icon }}"></i></a>
                    @endforeach
                @endif
            </div>

            <div class="small-12 medium-12 large-9 xlarge-9 semi-transparent-light-grey slight-rounding grid text">
                @foreach($project->projectTexts->sortBy('order') as $opt)
                    <{!! $opt->format !!}>{!! $opt->text !!}</{{ $opt->format }}>
                @endforeach
            </div>


        </div>
        @endif
    </div>
</section>

@endsection
