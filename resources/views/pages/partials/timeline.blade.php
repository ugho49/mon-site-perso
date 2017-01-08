<!-- BEGIN Timeline -->
<div id="parcours" class="grey lighten-5 scrollspy">
    <div class="row container" style="margin-bottom:0px;">
        <br>
        <h2 class="title-section">{{ trans('messages.sectionTimeline') }}</h2>
        <span class="title_border"></span>

        <div class="col s12">
            <section id="cd-timeline">
                @foreach($timelines as $t)
                    <div class="cd-timeline-block">
                        <div class="cd-timeline-img valign-wrapper {{ $t->type->background_class }}">
                            <i class="{{ $t->type->ico_class }} fa-2x"></i>
                        </div> <!-- cd-timeline-img -->

                        <div class="cd-timeline-content">
                            <h2>{{ $t->title }}</h2>
                            <h3>{{ $t->subtitle }}</h3>
                            <p>{!! nl2br($t->description) !!}</p>

                            <span class="cd-date">
                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $t->start)->formatLocalized('%b %Y') }}
                                @if ($t->end != null)
                                    , {{ Carbon\Carbon::createFromFormat('Y-m-d', $t->end)->formatLocalized('%b %Y') }}
                                @endif
                            </span>

                        </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->
                @endforeach
            </section>
        </div>
    </div>
</div>
<!-- END Timeline -->