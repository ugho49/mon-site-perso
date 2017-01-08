<!-- BEGIN About -->
<div class="section white scrollspy" id="about">
    <div class="row container">
        <br>
        <h2 class="title-section">{{ trans('messages.sectionAbout') }}</h2>
        <span class="title_border"></span>
        <p class="grey-text text-darken-3 lighten-3 about-text">
            {{ Session::get('info_about_p1') }}
        </p>
        <p class="grey-text text-darken-3 lighten-3 about-text">
            {{ Session::get('info_about_p2') }}
        </p>
    </div>
</div>
<!-- END About -->