@extends('layouts.app')

@section('content')
    @include('pages.partials.header')
    @include('pages.partials.navbar')

    @include('pages.partials.about')

    <div class="parallax-container">
        <div class="parallax"><img src="{{ URL::to('/build/images/parallax/macbookpro.jpg') }}" /></div>
    </div>

    @include('pages.partials.timeline', $timelines)

    <div class="parallax-container">
        <div class="parallax"><img src="{{ URL::to('/build/images/parallax/macbookair.jpg') }}" /></div>
    </div>

    @include('pages.partials.footer')
@endsection