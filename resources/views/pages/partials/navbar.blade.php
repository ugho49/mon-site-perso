<!-- BEGIN Navbar -->
<nav id="navigation" class="grey lighten-5">
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo hide-on-large-only"><img src="{{ URL::to('/build/images/icons/logo.png') }}" alt="logo" /></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down table-of-contents">
            <li class="btn_about"><a href="#about"><i class="material-icons md-light left">info</i>{{ trans('messages.navAbout') }}</a></li>
            <li class="btn_parcours"><a href="#parcours"><i class="material-icons md-light left">public</i>{{ trans('messages.navTimeline') }}</a></li>
            <li class="btn_competence"><a href="#competence"><i class="material-icons md-light left">star</i>{{ trans('messages.navSkills') }}</a></li>
            <li class="btn_projet"><a href="#projet"><i class="material-icons md-light left">work</i>{{ trans('messages.navProjects') }}</a></li>
            <li class="btn_contact"><a href="#contact"><i class="material-icons md-light left">message</i>{{ trans('messages.navContact') }}</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li class="btn_about">
                <a href="#about">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">info</i></div>
                        <div class="col offset-s1 s9 valign">{{ trans('messages.navAbout') }}</div>
                    </div>
                </a>
            </li>
            <li class="btn_parcours">
                <a href="#parcours">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">public</i></div>
                        <div class="col offset-s1 s9 valign">{{ trans('messages.navTimeline') }}</div>
                    </div>
                </a>
            </li>
            <li class="btn_competence">
                <a href="#competence">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">star</i></div>
                        <div class="col offset-s1 s9 valign">{{ trans('messages.navSkills') }}</div>
                    </div>
                </a>
            </li>
            <li class="btn_projet">
                <a href="#projet">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">work</i></div>
                        <div class="col offset-s1 s9 valign">{{ trans('messages.navProjects') }}</div>
                    </div>
                </a>
            </li>
            <li class="btn_contact">
                <a href="#contact">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">message</i></div>
                        <div class="col offset-s1 s9 valign">{{ trans('messages.navContact') }}</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- END Navbar -->