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

    @include('pages.partials.skills', ["skills" => $skills, "typeSkills" => $typeSkills])
    @include('pages.partials.projects', $projects)

    <div class="parallax-container">
        <div class="parallax"><img src="{{ URL::to('/build/images/parallax/coffee.jpg') }}" /></div>
    </div>

    @include('pages.partials.contact')

    <div class="fixed-action-btn" id="btn_home">
        <a href="#home"
           class="btn-floating btn-large teal darken-1 tooltipped waves-effect waves-light pulse"
           data-position="top"
           data-delay="20"
           data-tooltip="{{ trans('messages.btnGoTop') }}">
            <i class="fa fa-arrow-up"></i>
        </a>
    </div>

    @include('pages.partials.footer')
@endsection