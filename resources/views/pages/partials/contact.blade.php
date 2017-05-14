<!-- BEGIN Contact -->
<div class="white scrollspy" id="contact">
    <div class="row container">
        <br>
        <h2 class="title-section">{{ trans('messages.sectionContact') }}</h2>
        <span class="title_border"></span>
        <div class="col l6 m12">
            <h4 id="informations" class="subtitle-section">{{ trans('messages.sectionContactInfo') }}</h4>

            <div class="row valign-wrapper">
                <div class="col offset-m1 m2 s2 valign">
                    <i class="icon_contact material-icons">email</i>
                </div>
                <div class="col offset-m1 m8 offset-s1 s9 valign infos">{{ Session::get('info_mail') }}</div>
            </div>

            <div class="row valign-wrapper">
                <div class="col offset-m1 m2 s2 valign">
                    <i class="icon_contact material-icons">phone</i>
                </div>
                <div class="col offset-m1 m8 offset-s1 s9 valign infos">{{ Session::get('info_phone') }}</div>
            </div>

            <div class="row valign-wrapper">
                <div class="col offset-m1 m2 s2 valign">
                    <i class="icon_contact material-icons">location_on</i>
                </div>
                <div class="col offset-m1 m8 offset-s1 s9 valign infos">{{ Session::get('info_location') }}</div>
            </div>

            <div class="row valign-wrapper">
                <div class="col offset-m1 m2 s2 valign">
                    <i class="icon_contact material-icons">system_update_alt</i>
                </div>
                <div class="col offset-m1 m8 offset-s1 s9 valign infos">
                    <a href="{{ URL::to('/files/CV.pdf') }}" target="_blank">{{ trans('messages.sectionContactInfoBtnResume') }}</a>
                </div>
            </div>

            <div class="row">
                <div class="col offset-m1 m2 offset-s1 s1">
                    <a href="{{ Session::get('info_facebook') }}"
                       target="_blank"
                       class="btn-floating btn-large z-depth-1 hoverable tooltipped waves-effect waves-light"
                       id="btn_facebook"
                       data-position="bottom"
                       data-delay="20"
                       data-tooltip="Facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
                <div class="col m2 offset-s1 s1">
                    <a href="{{ Session::get('info_google+') }}"
                       target="_blank"
                       class="btn-floating btn-large z-depth-1 hoverable tooltipped waves-effect waves-light"
                       id="btn_gplus"
                       data-position="bottom"
                       data-delay="20"
                       data-tooltip="Google+">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </div>
                <div class="col m2 offset-s1 s1">
                    <a href="{{ Session::get('info_twitter') }}"
                       target="_blank"
                       class="btn-floating btn-large z-depth-1 hoverable tooltipped waves-effect waves-light"
                       id="btn_twitter"
                       data-position="bottom"
                       data-delay="20"
                       data-tooltip="Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
                <div class="col m2 offset-s1 s1">
                    <a href="{{ Session::get('info_linkedin') }}"
                       target="_blank"
                       class="btn-floating btn-large z-depth-1 hoverable tooltipped waves-effect waves-light"
                       id="btn_linkedin"
                       data-position="bottom"
                       data-delay="20"
                       data-tooltip="Linkedin">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
                <div class="col m2 offset-s1 s1">
                    <a href="{{ Session::get('info_github') }}"
                       target="_blank"
                       class="btn-floating btn-large z-depth-1 hoverable tooltipped waves-effect waves-light"
                       id="btn_github"
                       data-position="bottom"
                       data-delay="20"
                       data-tooltip="Github">
                        <i class="fa fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col l6 s12">
            <h4 id="findme" class="subtitle-section">{{ trans('messages.sectionContactFindMe') }}</h4>
            <div class="row">
                <div id="gmap" class="col s12" data-icon-url="{{ URL::to('/build/images/icons/location.png') }}"></div>
            </div>
        </div>
    </div>

    <div class="row grey lighten-5" style="margin-bottom: 0;">
        <div class="container">
            <div class="col s12">
                <br>
                <h4 class="subtitle-section">{{ trans('messages.sectionContactMessage') }}</h4>
                <div class="row">
                    <form class="col s12" id="formulaire" action="{{ URL::route('contact', App::getLocale()) }}">
                        <span id="ancre_flash"></span>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="first_name" type="text" required="required" class="f-field validate">
                                <label for="first_name">{{ trans('messages.formFirstName') }}</label>
                            </div>

                            <div class="input-field col s6">
                                <input id="last_name" type="text" required="required" class="f-field validate">
                                <label for="last_name">{{ trans('messages.formLastName') }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" type="email" required="required" class="f-field validate">
                                <label for="email"
                                       data-error="{{ trans('messages.formMessageEmailInvalid') }}"
                                       style="/*width: 0*/">{{ trans('messages.formEmail') }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="message"
                                          class="materialize-textarea validate f-field"
                                          required="required"
                                          data-length="1000"></textarea>
                                <label for="message" style="width: 0">{{ trans('messages.formMessage') }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="g-recaptcha" data-sitekey="{{ Session::get('info_recaptcha_public') }}"></div>
                        </div>
                        <div class="row">
                            <div class="center-align">
                                <button class="valign btn btn-large waves-effect waves-light green" type="submit" name="action" id="btn-form-submit">
                                    {{ trans('messages.formBtnSend') }}
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Contact -->