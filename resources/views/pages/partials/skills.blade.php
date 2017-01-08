<!-- BEGIN Skills -->
<div class="section white scrollspy" id="competence">
    <div class="row container">
        <br>
        <h2 class="title-section">{{ trans('messages.sectionSkills') }}</h2>
        <span class="title_border"></span>

        @foreach($typeSkills as $type)
            <div class="col s12 @if($type->id == 1) l12 @else l6 @endif">
                <h4 class="subtitle-section">{{ $type->libelle }}</h4>

                @foreach($skills as $skill)
                    @if($skill->type->id == $type->id)
                        <div class="col s12 @if($type->id == 1) l6 @endif">
                            <span class="title-progress">{{ $skill->libelle }}</span>

                            <div class="row">
                                <div class="col s12">
                                    <div class="progress">
                                        <div class="determinate skills" data-width="{{ $skill->percentage }}"
                                                    style="background-color: {{ $skill->color_hexa }}">
                                            <span class="percentage">{{ $skill->percentage }} %</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>
<!-- END Skills -->