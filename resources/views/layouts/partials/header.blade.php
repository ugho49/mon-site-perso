<!-- BEGIN Header -->
<div class="parallax-container scrollspy" id="home">
    <div id="languages">
        <img src="{{ URL::to('/build/images/icons/fr.jpg') }}" class="language_flag active" data-id="fr">
        <img src="{{ URL::to('/build/images/icons/en.jpg') }}" class="language_flag" data-id="en">
    </div>

    <div class="headline">
        <img src="{{ URL::to('/build/images/avatar.jpg') }}" alt="avatar" class="circle responsive-img" id="avatar"/>
        <h2>{{ Session::get('info_title') }}</h2>
        <h4>{{ Session::get('info_subtitle') }}</h4>
        <div id="home-arrow-down">
            <a href="#about">
                <i class="icon fa fa-angle-double-down fa-3x"></i>
            </a>
        </div>
    </div>

    <div class="parallax">
        <img src="{{ URL::to('/build/images/parallax/tablette.jpg') }}" id="fond_info" />
    </div>
</div>
<!-- END Header -->