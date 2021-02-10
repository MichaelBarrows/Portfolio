@extends('layouts.master')


@section('content')
<section id="project">
    <div class="grid-container grid">
        @if(isset($project))
        <div class="all-12">
            <h2>{{ $project->name}}</h2>
        </div>
        <div class="all-12 grid">
            @if($project->tech_stack != null)
            <div class="all-12 tech-stack">
                @foreach($project->tech_stack as $tech)
                <p>{{ $tech->name }}</p>
                @endforeach
            </div>
            <div class="small-12 medium-12 large-4 xlarge-4 project-card grid" data-tech-stack="@foreach($project->tech_stack as $tech){{ $tech->identifier }} @endforeach" id="{{ $project->id }}">
            @endif
            {{ $project->long_description }}
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
