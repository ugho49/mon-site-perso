<?php
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
include '../layouts/header.php';
include '../src/App.php';
$app = new App();
$info = $app->getInformations();
?>

<!-- DEBUT Partie Avatar -->
<div class="parallax-container scrollspy" id="home">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <img src="img/avatar.jpg" alt="avatar" class="circle responsive-img" id="avatar"/>
            </div>
            <div class="row center">
                <h2><?= $info['title']; ?></h2>
                <h4><?= $info['subtitle']; ?></h4>
            </div>
        </div>
    </div>
    <div class="parallax">
        <img src="img/image1.jpg" style="display: block; transform: translate3d(-50%, 172px, 0px);" id="fond_info">
    </div>
</div>
<!-- FIN Partie Avatar -->

<!--DEBUT Navigation-->
<nav id="navigation" class="<?= $app->getColor(); ?>">
    <div class="nav-wrapper container">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down table-of-contents">
            <li class="btn_about"><a href="#about"><i class="material-icons md-light left">info</i>A propos</a></li>
            <li class="btn_parcours"><a href="#parcours"><i class="material-icons md-light left">public</i>Parcours</a></li>
            <li class="btn_competence"><a href="#competence"><i class="material-icons md-light left">star</i>Compétences</a></li>
            <li class="btn_projet"><a href="#projet"><i class="material-icons md-light left">work</i>Projets</a></li>
            <li class="btn_contact"><a href="#contact"><i class="material-icons md-light left">message</i>Contact</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li class="btn_about">
                <a href="#about">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">info</i></div>
                        <div class="col offset-s1 s9 valign">A propos</div>
                    </div>
                </a>
            </li>
            <li class="btn_parcours">
                <a href="#parcours">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">public</i></div>
                        <div class="col offset-s1 s9 valign">Parcours</div>
                    </div>
                </a>
            </li>
            <li class="btn_competence">
                <a href="#competence">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">star</i></div>
                        <div class="col offset-s1 s9 valign">Compétences</div>
                    </div>
                </a>
            </li>
            <li class="btn_projet">
                <a href="#projet">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">work</i></div>
                        <div class="col offset-s1 s9 valign">Projets</div>
                    </div>
                </a>
            </li>
            <li class="btn_contact">
                <a href="#contact">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">message</i></div>
                        <div class="col offset-s1 s9 valign">Contact</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!--FIN Navigation-->

<div id="afterNavContainer">
    <!-- DEBUT Partie A propos -->
    <div class="section white scrollspy" id="about">
        <div class="row container">
            <br>
            <h2 class="title-section">A propos de moi</h2>
            <span class="title_border"></span>
            <p class="grey-text text-darken-3 lighten-3 about-text">
                Après l'obtention de mon BTS Services Informatiques aux Organisations obtenu au Lycée Chevrollier à Angers,
                je m'oriente naturellement vers une Licence MIAGE (Méthodes Informatiques Appliquées à la Gestion de l'Entreprise)
                à l'Université de Nantes.  Malheureusement ce parcours ne me plaisant pas, je me suis réorienté vers une licence Pro
                Systèmes informatiques et Logiciels à l'IUT de Nantes.
            </p>
            <p class="grey-text text-darken-3 lighten-3 about-text">
                Actuellement je suis donc en Licence Pro SIL et je réalise ma formation en alternance dans l'entreprise CGI.
            </p>
        </div>
    </div>
    <!-- FIN Partie A propos -->

    <div class="parallax-container">
        <div class="parallax"><img src="img/image5.jpg" style="display: block; transform: translate3d(-50%, 85px, 0px);"></div>
    </div>

    <!-- DEBUT Partie Parcours -->
    <div id="parcours" class="white scrollspy">
        <div class="row container">
            <br>
            <h2 class="title-section">Parcours</h2>
            <span class="title_border"></span>

            <div class="col s12">
                <ul class="timeline">

                    <?php foreach ($experiences = $app->getFormationExperience() as $e): ?>

                        <?php
                        $time = ucfirst(strftime('%b %Y', strtotime($e->start)));;

                        if ($e->end != null) {
                            $time .= ",  ".ucfirst(strftime('%b %Y', strtotime($e->end)));
                        }
                        ?>

                        <li>
                            <div class="row">
                                <div class="col l1 m1 s12">
                                    <div class="<?= $e->class; ?> tooltipped" data-position="bottom"
                                        data-delay="20"
                                        data-tooltip="<?= $time; ?>">
                                    </div>
                                </div>

                                <div class="col offset-l1 l10 offset-m1 m10 s12">
                                    <div class="description">
                                        <h2>
                                            <div class="row">
                                                <div class="col l8 m12">
                                                    <span class="title"><?= $e->title; ?></span>
                                                </div>
                                                <div class="col l4 m12">
                                                    <span class="time"><?= $time; ?></span>
                                                </div>
                                            </div>
                                        </h2>
                                        <h4><?= $e->subtitle; ?></h4>
                                        <span class="description-text"><?= nl2br($e->description); ?></span>
                                    </div>
                                </div>

                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
    <!-- FIN Partie Expérience -->

    <div class="parallax-container">
        <div class="parallax"><img src="img/image3.jpg" style="display: block; transform: translate3d(-50%, 85px, 0px);"></div>
    </div>

    <!-- DEBUT Partie Compétence -->
    <div class="section white scrollspy" id="competence">
        <div class="row container">
            <br>
            <h2 class="title-section">Mes compétences</h2>
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
    </div>
    <!-- FIN Partie Compétence -->

    <!-- DEBUT Partie Projet -->
    <div class="section scrollspy <?= $app->getColor(); ?>" id="projet">
        <div class="row container">
            <br>
            <h2 class="title-section">Mes Projets</h2>
            <span class="title_border"></span>

            <div class="row">
                <?php foreach ($app->getProjects() as $e): ?>
                    <div class="col m6 s12">
                        <div class="card medium">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator image-projet" src="img/<?= $e->image; ?>">
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
                                  <a href="<?= $e->url; ?>" target="_blank" class="link-projet">Accèder au projet</a>
                                </div>
                            <?php endif; ?>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4"><?= $e->title; ?><i class="material-icons right">close</i></span>
                                <p class="projet-description"><?= $e->description; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- FIN Partie Projet -->

    <div class="parallax-container">
        <div class="parallax"><img src="img/image4.jpg" style="display: block; transform: translate3d(-50%, 85px, 0px);"></div>
    </div>

    <!-- DEBUT Partie Contact -->
    <div class="white scrollspy" id="contact">
        <div class="row container">
            <br>
            <h2 class="title-section">Contact</h2>
            <span class="title_border"></span>
            <div class="col l6 m12">
                <h4 id="informations" class="subtitle-section">Informations</h4>

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
                    <div class="col offset-m1 m8 offset-s1 s9 valign infos"><a href="files.php?file=cv" target="_blank">Télécharger mon CV</a></div>
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
                <h4 id="findme" class="subtitle-section">Me trouver</h4>
                <div class="row">
                    <div id="gmap" class="col s12"></div>
                </div>
            </div>
        </div>

        <div class="row <?= $app->getColor(); ?>" style="margin-bottom: 0;">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <br>
                        <h4 class="subtitle-section">Me contacter</h4>
                        <div class="row">
                            <form class="col s12" id="formulaire">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="first_name" type="text" required="required">
                                        <label for="first_name">Prénom</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="last_name" type="text" required="required">
                                        <label for="last_name">Nom</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input id="email" type="email" required="required" class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">mode_edit</i>
                                        <textarea id="message" class="materialize-textarea" required="required"></textarea>
                                        <label for="message">Message ...</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="g-recaptcha" data-sitekey="<?= $info['recaptcha_public']; ?>"></div>
                                </div>
                                <div class="row">
                                    <div class="center-align">
                                        <button class="valign btn btn-large waves-effect waves-light green" type="submit" name="action">
                                            Envoyer
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
    </div>
    <!-- FIN Partie Contact -->

    <div class="fixed-action-btn" id="btn_home">
        <a href="#home"
        class="btn-floating btn-large teal darken-1 tooltipped waves-effect waves-light"
        data-position="top"
        data-delay="20"
        data-tooltip="Remonter en haut">
        <i class="fa fa-arrow-up"></i>
    </a>
</div>

<footer class="page-footer <?= $app->getColor(); ?>" style="margin-top:0px;">
    <div class="footer-copyright">
        <div class="container center">© 2015 Ugho STEPHAN, All rights reserved.</div>
    </div>
</footer>
<?php include '../layouts/footer.php'; ?>
