@extends('layouts.master')


@section('content')
<section class="project">
    <div class="grid-container grid">
        @if(isset($project))
        <div class="desktop-12 mobile-12">
            <h2>{{ $project->name}}</h2>
        </div>
        <div class="desktop-12 mobile-12 grid">
            @if($project->tech_stack != null)
            <div class="all-12 tech-stack">
                @foreach($project->tech_stack as $tech)
                <p>{{ $tech->name }}
                @endforeach
            </div>
            <div class="desktop-4 mobile-12 project-card grid" data-tech-stack="@foreach($project->tech_stack as $tech){{ $tech->identifier }} @endforeach" id="{{ $project->id }}">
            @endif
            {{ $project->long_description }}
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
