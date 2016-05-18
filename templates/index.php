<?php
    $app    = $slim->controleur;
    $info   = $app->getInformations();
    $lang   = $app->getLang();
    $images = [];

    switch ($app->checkScreen()) {
        case 'TABLET':
            // images for tablet
            $images = ['tablette-tab-min.jpg', 'macbookpro-tab-min.jpg', 'macbookair-tab-min.jpg', 'coffee-tab-min.jpg'];
            break;

        case 'MOBILE':
            // images for mobile
            $images = ['tablette-mob-min.jpg', 'macbookpro-mob-min.jpg', 'macbookair-mob-min.jpg', 'coffee-mob-min.jpg'];
            break;

        default:
            // images for deskop
            $images = ['tablette-min.jpg', 'macbookpro-min.jpg', 'macbookair-min.jpg', 'coffee-min.jpg'];
            break;
    }
?>

<!-- DEBUT Partie Avatar -->
<div class="parallax-container scrollspy" id="home">
    <div id="languages">
        <img src="/img/fr.jpg" class="language_flag <?php if ($_SESSION['lang'] == "fr"): ?>active<?php endif; ?>" data-id="fr">
        <img src="/img/en.jpg" class="language_flag <?php if ($_SESSION['lang'] == "en"): ?>active<?php endif; ?>" data-id="en">
    </div>

    <div class="headline">
        <img src="/img/avatar.jpg" alt="avatar" class="circle responsive-img" id="avatar"/>
        <h2><?= $info['title']; ?></h2>
        <h4><?= $info['subtitle']; ?></h4>
        <div id="home-arrow-down">
            <a href="#about">
                <i class="icon fa fa-angle-double-down fa-3x"></i>
            </a>
        </div>
    </div>

    <div class="parallax">
        <img src="/img/<?= $images[0]; ?>" id="fond_info" />
    </div>
</div>
<!-- FIN Partie Avatar -->

<!--DEBUT Navigation-->
<nav id="navigation" class="<?= $app->getColor(); ?>">
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo hide-on-large-only"><img src="/img/logo.png" alt="logo" /></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down table-of-contents">
            <li class="btn_about"><a href="#about"><i class="material-icons md-light left">info</i><?= $lang->navAbout; ?></a></li>
            <li class="btn_parcours"><a href="#parcours"><i class="material-icons md-light left">public</i><?= $lang->navTimeline; ?></a></li>
            <li class="btn_competence"><a href="#competence"><i class="material-icons md-light left">star</i><?= $lang->navSkills; ?></a></li>
            <li class="btn_projet"><a href="#projet"><i class="material-icons md-light left">work</i><?= $lang->navProjects; ?></a></li>
            <li class="btn_contact"><a href="#contact"><i class="material-icons md-light left">message</i><?= $lang->navContact; ?></a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li class="btn_about">
                <a href="#about">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">info</i></div>
                        <div class="col offset-s1 s9 valign"><?= $lang->navAbout; ?></div>
                    </div>
                </a>
            </li>
            <li class="btn_parcours">
                <a href="#parcours">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">public</i></div>
                        <div class="col offset-s1 s9 valign"><?= $lang->navTimeline; ?></div>
                    </div>
                </a>
            </li>
            <li class="btn_competence">
                <a href="#competence">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">star</i></div>
                        <div class="col offset-s1 s9 valign"><?= $lang->navSkills; ?></div>
                    </div>
                </a>
            </li>
            <li class="btn_projet">
                <a href="#projet">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">work</i></div>
                        <div class="col offset-s1 s9 valign"><?= $lang->navProjects; ?></div>
                    </div>
                </a>
            </li>
            <li class="btn_contact">
                <a href="#contact">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">message</i></div>
                        <div class="col offset-s1 s9 valign"><?= $lang->navContact; ?></div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!--FIN Navigation-->

<!-- DEBUT Partie A propos -->
<div class="section white scrollspy" id="about">
    <div class="row container">
        <br>
        <h2 class="title-section"><?= $lang->sectionAbout; ?></h2>
        <span class="title_border"></span>
        <p class="grey-text text-darken-3 lighten-3 about-text">
            <?= $lang->sectionAboutText1; ?>
        </p>
        <p class="grey-text text-darken-3 lighten-3 about-text">
            <?= $lang->sectionAboutText2; ?>
        </p>
    </div>
</div>
<!-- FIN Partie A propos -->

<div class="parallax-container">
    <div class="parallax"><img src="/img/<?= $images[1]; ?>" /></div>
</div>

<!-- DEBUT Partie Parcours -->
<div id="parcours" class="<?= $app->getColor(); ?> scrollspy">
    <div class="row container" style="margin-bottom:0px;">
        <br>
        <h2 class="title-section"><?= $lang->sectionTimeline; ?></h2>
        <span class="title_border"></span>

        <div class="col s12">
            <section id="cd-timeline">
                <?php foreach ($experiences = $app->getTimeline() as $e): ?>

                    <?php
                    $time = ucfirst(strftime('%b %Y', strtotime($e->start)));;

                    if ($e->end != null) {
                        $time .= ",  ".ucfirst(strftime('%b %Y', strtotime($e->end)));
                    }
                    ?>

                    <div class="cd-timeline-block">
                        <div class="cd-timeline-img valign-wrapper <?= $e->background_class; ?>">
                            <i class="<?= $e->ico_class; ?> fa-2x"></i>
                        </div> <!-- cd-timeline-img -->

                        <div class="cd-timeline-content">
                            <h2><?= $e->title; ?></h2>
                            <h3><?= $e->subtitle; ?></h3>
                            <p><?= nl2br($e->description); ?></p>
                            <span class="cd-date"><?= $time; ?></span>
                        </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->
                <?php endforeach; ?>
            </section>
        </div>
    </div>
</div>
<!-- FIN Partie Parcours -->

<div class="parallax-container">
    <div class="parallax"><img src="/img/<?= $images[2]; ?>" /></div>
</div>

<!-- DEBUT Partie Compétence -->
<div class="section white scrollspy" id="competence">
    <div class="row container">
        <br>
        <h2 class="title-section"><?= $lang->sectionSkills; ?></h2>
        <span class="title_border"></span>

        <?php foreach ($app->getTypeSkills() as $type): ?>

            <?php if ($type->id == 1): ?>
                <div class="col l12 s12">
            <?php else: ?>
                <div class="col l6 s12">
            <?php endif; ?>
                    <h4 class="subtitle-section"><?= $type->libelle; ?></h4>

                    <?php foreach ($app->getSkillsByType($type->id) as $skill): ?>
                        <?php if ($type->id == 1): ?>
                            <div class="col l6 s12">
                        <?php else: ?>
                            <div class="col s12">
                        <?php endif; ?>
                                <span class="title-progress"><?= $skill->libelle; ?></span>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="progress">
                                            <div class="determinate skills" data-width="<?= $skill->percentage; ?>" style="background-color: <?= $skill->color_hexa; ?>">
                                                <span class="percentage">
                                                    <?= $skill->percentage; ?> %
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; ?>
                </div>
         <?php endforeach; ?>
    </div>
</div>
<!-- FIN Partie Compétence -->

<!-- DEBUT Partie Projet -->
<div class="section scrollspy <?= $app->getColor(); ?>" id="projet">
    <div class="row container">
        <br>
        <h2 class="title-section"><?= $lang->sectionProjects; ?></h2>
        <span class="title_border"></span>

        <div class="row">
            <?php foreach ($app->getProjects() as $e): ?>
                <?php if ($e->enabled): ?>
                    <div class="col l4 m6 s12">
                        <div class="card medium hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <?php if ($e->image): ?>
                                    <img class="activator image-projet" src="img/<?= $e->image; ?>">
                                <?php else: ?>
                                    <img class="activator image-projet" src="img/no_image.png">
                                <?php endif; ?>
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">
                                    <?= $e->title; ?>
                                    <i class="material-icons right">more_vert</i>
                                </span>
                                <p class="truncate projet-description"><?= $e->description; ?></p>
                            </div>
                            <?php if ($e->url): ?>
                                <div class="card-action center-align">
                                    <a href="<?= $e->url; ?>" target="_blank" class="link-projet"><?= $e->button_name; ?></a>
                                </div>
                            <?php endif; ?>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4"><?= $e->title; ?><i class="material-icons right">close</i></span>
                                <p class="projet-description"><?= nl2br($e->description); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- FIN Partie Projet -->

<div class="parallax-container">
    <div class="parallax"><img src="img/<?= $images[3]; ?>" /></div>
</div>

<!-- DEBUT Partie Contact -->
<div class="white scrollspy" id="contact">
    <div class="row container">
        <br>
        <h2 class="title-section"><?= $lang->sectionContact; ?></h2>
        <span class="title_border"></span>
        <div class="col l6 m12">
            <h4 id="informations" class="subtitle-section"><?= $lang->sectionContactInfo; ?></h4>

            <div class="row valign-wrapper">
                <div class="col offset-m1 m2 s2 valign">
                    <i class="icon_contact material-icons">email</i>
                </div>
                <div class="col offset-m1 m8 offset-s1 s9 valign infos"><?= $info['mail']; ?></div>
            </div>

            <div class="row valign-wrapper">
                <div class="col offset-m1 m2 s2 valign">
                    <i class="icon_contact material-icons">phone</i>
                </div>
                <div class="col offset-m1 m8 offset-s1 s9 valign infos"><?= $info['phone']; ?></div>
            </div>

            <div class="row valign-wrapper">
                <div class="col offset-m1 m2 s2 valign">
                    <i class="icon_contact material-icons">location_on</i>
                </div>
                <div class="col offset-m1 m8 offset-s1 s9 valign infos"><?= $info['location']; ?></div>
            </div>

            <div class="row valign-wrapper">
                <div class="col offset-m1 m2 s2 valign">
                    <i class="icon_contact material-icons">system_update_alt</i>
                </div>
                <div class="col offset-m1 m8 offset-s1 s9 valign infos"><a href="<?= $slim->router->pathFor('files', ['name' => 'CV']);?>" target="_blank"><?= $lang->sectionContactInfoBtnResume; ?></a></div>
            </div>

            <div class="row">
                <div class="col offset-m1 m2 offset-s1 s1">
                    <a href="<?= $info['facebook']; ?>"
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
                    <a href="<?= $info['google+']; ?>"
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
                    <a href="<?= $info['twitter']; ?>"
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
                    <a href="<?= $info['linkedin']; ?>"
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
                    <a href="<?= $info['github']; ?>"
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
            <h4 id="findme" class="subtitle-section"><?= $lang->sectionContactFindMe; ?></h4>
            <div class="row">
                <div id="gmap" class="col s12"></div>
            </div>
        </div>
    </div>

    <div class="row <?= $app->getColor(); ?>" style="margin-bottom: 0;">
        <div class="container">
            <div class="col s12">
                <br>
                <h4 class="subtitle-section"><?= $lang->sectionContactMessage; ?></h4>
                <div class="row">
                    <form class="col s12" id="formulaire">
                        <span id="ancre_flash"></span>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="first_name" type="text" required="required" class="f-field validate">
                                <label for="first_name"><?= $lang->formFirstName; ?></label>
                            </div>

                            <div class="input-field col s6">
                                <input id="last_name" type="text" required="required" class="f-field validate">
                                <label for="last_name"><?= $lang->formLastName; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" type="email" required="required" class="f-field validate">
                                <label for="email" style="width: 0"><?= $lang->formEmail; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="message" class="materialize-textarea validate f-field" required="required" length="1000"></textarea>
                                <label for="message"><?= $lang->formMessage; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="g-recaptcha" data-sitekey="<?= $info['recaptcha_public']; ?>"></div>
                        </div>
                        <div class="row">
                            <div class="center-align">
                                <button class="valign btn btn-large waves-effect waves-light green disabled" type="submit" name="action" id="btn-form-submit" disabled="disabled">
                                    <?= $lang->formBtnSend; ?>
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
<!-- FIN Partie Contact -->

<div class="fixed-action-btn" id="btn_home">
    <a href="#home"
    class="btn-floating btn-large teal darken-1 tooltipped waves-effect waves-light"
    data-position="top"
    data-delay="20"
    data-tooltip="<?= $lang->btnGoTop; ?>">
        <i class="fa fa-arrow-up"></i>
    </a>
</div>

<footer class="page-footer grey lighten-3">
    <div class="footer-copyright">
        <div class="container center">© 2015 Ugho STEPHAN, All rights reserved.</div>
    </div>
</footer>
