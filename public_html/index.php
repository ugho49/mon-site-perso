<?php
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
include '../layouts/header.php';
$pdo = require '../src/Pdo.php';
$color = "grey darken-1";
$color_btn = "grey lighten-1";
?>

<!-- DEBUT Partie Avatar -->
<div class="parallax-container scrollspy" id="home">
    <div class="parallax">
        <img src="img/image1.jpg" style="display: block; transform: translate3d(-50%, 172px, 0px);" class="fond_info">
        <div class="info">
            <img src="img/avatar.jpg" alt="avatar" class="avatar" />
            <h2>Ugho Stephan</h2>
            <h4>Développeur Web & Mobile </h4>
        </div>
    </div>
</div>
<!-- FIN Partie Avatar -->

<!--DEBUT Navigation-->
<!-- Dropdown Structure -->
<ul id="dropdown_contact" class="dropdown-content grey darken-1">
  <li><a href="#informations">Informations</a></li>
  <li><a href="#findme">Me trouver</a></li>
  <li class="divider"></li>
  <li><a href="#contactme">Me contacter</a></li>
</ul>

<nav id="navigation" class="grey darken-1">
    <div class="nav-wrapper container">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
            <li class="btn_home"><a href="#home"><i class="material-icons md-light left">home</i>Accueil</a></li>
            <li class="btn_about"><a href="#about"><i class="material-icons md-light left">info</i>A propos</a></li>
            <li class="btn_experience"><a href="#formation"><i class="material-icons md-light left">done</i>Formations</a></li>
            <li class="btn_formation"><a href="#experience"><i class="material-icons md-light left">star</i>Expériences</a></li>
            <li class="btn_competence"><a href="#competence"><i class="material-icons md-light left">public</i>Compétences</a></li>
            <li class="btn_contact dropdown-button" data-activates="dropdown_contact"><a href="#!"><i class="material-icons md-light left">message</i>Contact</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li class="btn_home">
                <a href="#home">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">home</i></div>
                        <div class="col offset-s1 s9 valign">Accueil</div>
                    </div>
                </a>
            </li>
            <li class="btn_about">
                <a href="#about">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">info</i></div>
                        <div class="col offset-s1 s9 valign">A propos</div>
                    </div>
                </a>
            </li>
            <li class="btn_formation">
                <a href="#formation">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">done</i></div>
                        <div class="col offset-s1 s9 valign">Mes formations</div>
                    </div>
                </a>
            </li>
            <li class="btn_experience">
                <a href="#experience">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">star</i></div>
                        <div class="col offset-s1 s9 valign">Mes expériences</div>
                    </div>
                </a>
            </li>
            <li class="btn_competence">
                <a href="#competence">
                    <div class="row valign-wrapper">
                        <div class="s1 valign"><i class="material-icons md-light">public</i></div>
                        <div class="col offset-s1 s9 valign">Mes compétences</div>
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
            <h2 class="title_section">A propos de moi</h2>
            <span class="title_border"></span>
            <p class="grey-text text-darken-3 lighten-3 flow-text">
                Après l'obtention de mon BTS Services Informatiques aux Organisations obtenu au Lycée Chevrollier à Angers,
                je m'oriente naturellement vers une Licence MIAGE (Méthodes Informatiques Appliquées à la Gestion de l'Entreprise)
                à l'Université de Nantes.  Malheureusement ce parcours ne me plaisant pas, je me suis réorienté vers une licence Pro
                Systèmes informatiques et Logiciels à l'IUT de Nantes.
            </p>
            <p class="grey-text text-darken-3 lighten-3 flow-text">
                Actuellement je suis donc en Licence Pro SIL et je réalise ma formation en alternance dans l'entreprise CGI.
            </p>
        </div>
    </div>
    <!-- FIN Partie A propos -->

    <div class="parallax-container">
        <div class="parallax"><img src="img/image5.jpg" style="display: block; transform: translate3d(-50%, 85px, 0px);"></div>
    </div>

    <!-- DEBUT Partie Formation -->
    <div class="section white scrollspy" id="formation">
        <div class="row container">
            <br>
            <h2 class="title_section">Mes formations</h2>
            <span class="title_border"></span>

            <?php
            $requete = $pdo->prepare('SELECT * FROM formations ORDER BY start DESC');
            $requete->execute();
            $formations = $requete->fetchAll();
            $nb_row = count($formations);
            $cpt = 0;
            ?>

            <?php foreach ($formations as $e): ?>
                <?php $cpt++; ?>

                <div class="row expe">
                    <div class="col l2 m2 offset-s4 s6" style="margin-bottom:10px;">
                        <div class="bulle circle valign-wrapper flow-text" style="background-color: <?= $e->color_hexa; ?>;">
                            <div class="valign" style="width: 100%;"><?= $e->start; ?>
                            <?php if ($e->end != null) {
                                echo ",<br>".$e->end;
                            }?>
                            </div>
                        </div>
                    </div>
                    <div class="col offset-l1 l9 offset-m2 m8 s12 expe_desc grey-text text-darken-3 lighten-3">
                        <span class="expe_title"><?= $e->nom_ecole; ?></span>
                        <br>
                        <span class="expe_subtitle"><?= $e->titre; ?></span>
                        <p><?= $e->subtitle; ?></p>
                    </div>
                </div>

                <?php if ($cpt != $nb_row): ?>
                     <div class="divider"></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- FIN Partie Formation -->

    <div class="parallax-container">
        <div class="parallax"><img src="img/image2.jpg" style="display: block; transform: translate3d(-50%, 85px, 0px);"></div>
    </div>

    <!-- DEBUT Partie Expérience -->
    <div class="section white scrollspy" id="experience">
        <div class="row container">
            <br>
            <h2 class="title_section">Mes expériences</h2>
            <span class="title_border"></span>

            <?php
            $requete = $pdo->prepare('SELECT * FROM experience ORDER BY start DESC');
            $requete->execute();
            $experiences = $requete->fetchAll();
            $nb_row = count($experiences);
            $cpt = 0;
            ?>

            <?php foreach ($experiences as $e): ?>
                <?php $cpt++; ?>

                <div class="row expe">
                    <div class="col l2 m2 offset-s4 s6" style="margin-bottom:10px;">
                        <div class="bulle circle valign-wrapper flow-text" style="background-color: <?= $e->color_hexa; ?>;">
                            <div class="valign" style="width: 100%;"><?= ucfirst(strftime('%b %Y', strtotime($e->start))); ?>
                            <?php if ($e->end != null) {
                                echo ",<br>".ucfirst(strftime('%b %Y', strtotime($e->end)));
                            }?>
                            </div>
                        </div>
                    </div>
                    <div class="col offset-l1 l9 offset-m2 m8 s12 expe_desc grey-text text-darken-3 lighten-3">
                        <span class="expe_title"><?= $e->nom_entreprise; ?></span>
                        <br>
                        <span class="expe_subtitle"><?= $e->titre; ?></span>
                        <p><?= $e->description; ?></p>
                    </div>
                </div>

                <?php if ($cpt != $nb_row): ?>
                     <div class="divider"></div>
                <?php endif; ?>
            <?php endforeach; ?>

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
            <h2 class="title_section">Mes compétences</h2>
            <span class="title_border"></span>
            <?php
            $requete = $pdo->prepare('SELECT * FROM type_skills ORDER BY id ASC');
            $requete->execute();
            $types = $requete->fetchAll();
            ?>

            <?php foreach ($types as $type): ?>

                <?php if ($type->id == 1): ?>
                    <div class="col l12 s12">
                    <?php else: ?>
                        <div class="col l6 s12">
                        <?php endif; ?>
                        <h4><?= $type->libelle; ?></h4>
                        <?php
                        $requete = $pdo->prepare('SELECT * FROM skills WHERE type_skill_id = ?');
                        $requete->execute([$type->id]);
                        $skills = $requete->fetchAll();
                        $cpt = 0;
                        ?>
                        <?php foreach ($skills as $skill): ?>
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
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- FIN Partie Compétence -->

        <div class="parallax-container">
            <div class="parallax"><img src="img/image4.jpg" style="display: block; transform: translate3d(-50%, 85px, 0px);"></div>
        </div>

        <!-- DEBUT Partie Contact -->
        <div class="section white scrollspy" id="contact">
            <div class="row container">
                <br>
                <h2 class="title_section">Contact</h2>
                <span class="title_border"></span>
                <div class="col l6 m12">
                    <h4 id="informations" class="scrollspy">Informations</h4>

                    <div class="row valign-wrapper">
                        <div class="col offset-m1 m2 s2 valign">
                            <i class="icon_contact material-icons">email</i>
                        </div>
                        <div class="col offset-m1 m8 offset-s1 s9 valign">stephan.ugho@gmail.com</div>
                    </div>

                    <div class="row valign-wrapper">
                        <div class="col offset-m1 m2 s2 valign">
                            <i class="icon_contact material-icons">phone</i>
                        </div>
                        <div class="col offset-m1 m8 offset-s1 s9 valign">06 88 10 65 38</div>
                    </div>

                    <div class="row valign-wrapper">
                        <div class="col offset-m1 m2 s2 valign">
                            <i class="icon_contact material-icons">location_on</i>
                        </div>
                        <div class="col offset-m1 m8 offset-s1 s9 valign">Nantes, France</div>
                    </div>

                    <div class="row valign-wrapper">
                        <div class="col offset-m1 m2 s2 valign">
                            <i class="icon_contact material-icons">system_update_alt</i>
                        </div>
                        <div class="col offset-m1 m8 offset-s1 s9 valign"><a href="files/CV.pdf" target="_blank">Télécharger mon CV</a></div>
                    </div>

                    <div class="row">
                        <div class="col offset-m1 m2 s2">
                            <a href="https://www.facebook.com/ugho.stephan" target="_blank">
                                <img src="img/social_facebook.png" alt="facebook+" class="social_btn hoverable circle z-depth-1"/>
                            </a>
                        </div>
                        <div class="col s2">
                            <a href="https://plus.google.com/+UghoSTEPHAN" target="_blank">
                                <img src="img/social_gplus.png" alt="google+" class="social_btn hoverable circle z-depth-1"/>
                            </a>
                        </div>
                        <div class="col s2">
                            <a href="https://twitter.com/ughoste" target="_blank">
                                <img src="img/social_twitter.png" alt="twitter" class="social_btn hoverable circle z-depth-1"/>
                            </a>
                        </div>
                        <div class="col s2">
                            <a href="https://fr.linkedin.com/in/ugho-stephan-37127aa0" target="_blank">
                                <img src="img/social_linkedin.png" alt="linkedin" class="social_btn hoverable circle z-depth-1"/>
                            </a>
                        </div>
                        <div class="col s2">
                            <a href="https://github.com/ugho49" target="_blank">
                                <img src="img/social_github.png" alt="github" class="social_btn hoverable circle z-depth-1"/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col l6 s12">
                    <h4 id="findme" class="scrollspy">Me trouver</h4>
                    <div class="row">
                        <div id="gmap" class="col s12"></div>
                    </div>
                </div>
                <div class="col s12">
                    <h4 id="title_form"><span id="contactme" class="scrollspy"></span>Me contacter</h4>
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
                                    <input id="email" type="email" required="required">
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
                                <div class="g-recaptcha" data-sitekey="6Ldu2wkTAAAAAEg7atOJ4HFQYM8EYpdBGgCFN6Ri"></div>
                            </div>
                            <div class="row">
                                <div class="center-align">   
                                    <button class="valign btn btn-large waves-effect waves-light blue" type="submit" name="action">
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
        <!-- FIN Partie Contact -->
    </div>

    <footer class="page-footer <?= $color; ?>" style="margin-top:0px;">
        <div class="footer-copyright">
            <div class="container">© 2015 Ugho STEPHAN, All rights reserved.</div>
        </div>
    </footer>
    <?php include '../layouts/footer.php'; ?>
