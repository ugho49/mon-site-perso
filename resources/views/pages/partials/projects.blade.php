<!-- BEGIN Projects -->
<div class="section scrollspy grey lighten-5" id="projet">
    <div class="row container">
        <br>
        <h2 class="title-section">{{ trans('messages.sectionProjects') }}</h2>
        <span class="title_border"></span>

        <div class="row">
            @foreach($projects as $project)
                @if($project->enabled)
                    <div class="col l4 m6 s12">
                        <div class="card medium hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                @if($project->imagePath)
                                    <img class="activator image-projet" src="{{ URL::to('/build/images/projects/' . $project->imagePath) }}">
                                @else
                                    <img class="activator image-projet" src="{{ URL::to('/build/images/projects/no_image.png') }}">
                                @endif
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">
                                    {{ $project->title }}
                                    <i class="material-icons right">more_vert</i>
                                </span>
                                <p class="truncate projet-description">{{ $project->description }}</p>
                            </div>
                            @if($project->url)
                                <div class="card-action center-align">
                                    <a href="{{ $project->url }}" target="_blank" class="link-projet">{{ $project->action }}</a>
                                </div>
                            @endif
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">{{ $project->title }}<i class="material-icons right">close</i></span>
                                <p class="projet-description">{{ $project->description }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- END Projects -->