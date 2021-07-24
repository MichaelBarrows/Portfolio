@extends('layouts.master')

@if(isset($image))
    @section('canonical')
    <link rel="canonical" href="https://michaelbarrows.com/images/{{ $image->id }}">
    @endsection

    @section('title')
    {{ $image->project->name }} | 
    @endsection
@endif

@section('content')
    <section id="image">
        <div class="grid-container grid">
            <div class="all-12">
                <h2><a href="/project/{{ $image->project->pretty_url }}">{{ $image->project->name }}</a></h2>
            </div>
            <div class="all-12">
                @if ($prev_image_id != 0)
                    <a href="/images/{{ $prev_image_id }}"><i class="fas fa-chevron-left"></i> Previous</a>
                @endif
                <p>{{ $counter }}</p>
                @if ($next_image_id != 0)
                    <a href="/images/{{ $next_image_id }}">Next <i class="fas fa-chevron-right"></i> </a>
                @endif
            </div>

            @if (isset($image))
                <div class="all-12">
                    <img src="{{ $image->filepath_filename }}" alt="{{ $image->alt_text }}">
                </div>
                <p class="all-12 align-center">{{ $image->description }}dfgfgd</p>
            @endif
            <div class="all-12">
                @if ($prev_image_id != 0)
                    <a href="/images/{{ $prev_image_id }}"><i class="fas fa-chevron-left"></i> Previous</a>
                @endif
                <p>{{ $counter }}</p>
                @if ($next_image_id != 0)
                    <a href="/images/{{ $next_image_id }}">Next <i class="fas fa-chevron-right"></i> </a>
                @endif
            </div>
        </div>
    </section>
@endsection
