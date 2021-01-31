@extends('layouts.master')


@section('content')
<section class="about">
    <div class="grid-container grid">
        <div class="desktop-12 mobile-12">
            <h2>About Me</h2>
        </div>
        <div class="desktop-3 mobile-12">
            <img class="mb" src="{{ asset('img/michaelbarrows.png') }}" alt="Picture of me">
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

@endsection
