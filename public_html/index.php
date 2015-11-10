<?php
include '../layouts/header.php';
$pdo = require '../src/pdo.php';
$color = "grey darken-1";
$color_btn = "grey lighten-1";
?>

<!-- DEBUT Partie Avatar -->
<div class="parallax-container">
    <div class="parallax">
        <img src="img/image1.jpg" style="display: block; transform: translate3d(-50%, 172px, 0px);" class="fond_info">
        <div class="info">
            <img src="img/avatar.jpg" alt="avatar" class="avatar circle" />
            <h2>Ugho Stephan</h2>
            <h4>developpeur Web & Mobile </h4>
        </div>
    </div>
</div>
<!-- FIN Partie Avatar -->

<!-- DEBUT Partie Avatar -->
<div class="section white">
    <div class="row container">
        <h2 class="title_section">A propos de moi</h2>
        <span class="title_border"></span>
        <p class="grey-text text-darken-3 lighten-3">
            Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
        </p>
    </div>
</div>
<!-- FIN Partie Avatar -->

<div class="parallax-container">
    <div class="parallax"><img src="img/image3.jpg" style="display: block; transform: translate3d(-50%, 85px, 0px);"></div>
</div>

<!-- DEBUT Partie Expérience -->
<div class="section white">
    <div class="row container">
        <h2 class="title_section">Mes expériences</h2>
        <span class="title_border"></span>
        <p class="grey-text text-darken-3 lighten-3">
            Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
        </p>
    </div>
</div>
<!-- FIN Partie Expérience -->

<div class="parallax-container">
    <div class="parallax"><img src="img/image2.jpg" style="display: block; transform: translate3d(-50%, 85px, 0px);"></div>
</div>

<!-- DEBUT Partie Compétence -->
<div class="section white">
    <div class="row container">
        <h2 class="title_section">Mes compétences</h2>
        <span class="title_border"></span>
        <?php
        $requete = $pdo->prepare('SELECT * FROM type_skills ORDER BY id DESC');
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
                                    <div class="determinate" style="width: <?= $skill->percentage; ?>%; background-color: <?= $skill->color_hexa; ?>"></div>
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
    <div class="section white">
        <div class="row container">
            <h2 class="title_section">Contact</h2>
            <span class="title_border"></span>
            <div class="col l6 m12">
                <h4>Rester en contact</h4>
                <div class="row valign-wrapper">
                    <div class="col offset-s1 s2 valign">
                        <i class="icon_contact material-icons">email</i>
                    </div>
                    <div class="col offset-s1 s8 valign">stephan.ugho@gmail.com</div>
                </div>
                <div class="row valign-wrapper">
                    <div class="col offset-s1 s2 valign">
                        <i class="icon_contact material-icons">phone</i>
                    </div>
                    <div class="col offset-s1 s8 valign">06 88 10 65 38</div>
                </div>
                <div class="row valign-wrapper">
                    <div class="col offset-s1 s2 valign">
                        <i class="icon_contact material-icons">location_on</i>
                    </div>
                    <div class="col offset-s1 s8 valign">Nantes, France</div>
                </div>
                <div class="row valign-wrapper">
                    <div class="col offset-s1 s2 valign">
                        <i class="icon_contact material-icons">system_update_alt</i>
                    </div>
                    <div class="col offset-s1 s8 valign"><a href="files/CV.pdf">Télécharger mon CV</a></div>
                </div>
                <div class="row">
                    <div class="col offset-s1 s2">
                        <a href="https://www.facebook.com/ugho.stephan" target="_blank">
                            <img src="img/social_facebook.png" alt="facebook+" class="social_btn hoverable circle"/>
                        </a>
                    </div>
                    <div class="col s2">
                        <a href="https://plus.google.com/+UghoSTEPHAN" target="_blank">
                            <img src="img/social_gplus.png" alt="google+" class="social_btn hoverable circle"/>
                        </a>
                    </div>
                    <div class="col s2">
                        <a href="https://twitter.com/ughoste" target="_blank">
                            <img src="img/social_twitter.png" alt="twitter" class="social_btn hoverable circle"/>
                        </a>
                    </div>
                    <div class="col s2">
                        <a href="https://fr.linkedin.com/in/ugho-stephan-37127aa0" target="_blank">
                            <img src="img/social_linkedin.png" alt="linkedin" class="social_btn hoverable circle"/>
                        </a>
                    </div>
                    <div class="col s2">
                        <a href="https://github.com/ugho49" target="_blank">
                            <img src="img/social_github.png" alt="github" class="social_btn hoverable circle"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col l6 s12">
                <h4>Me contacter</h4>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">account_circle</i>
                				<input id="first_name" type="text">
                				<label for="first_name">Prénom</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" type="text">
                                <label for="last_name">Nom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" type="email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="message" class="materialize-textarea"></textarea>
                                <label for="message">Message ...</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="g-recaptcha" data-sitekey="6Ldu2wkTAAAAAEg7atOJ4HFQYM8EYpdBGgCFN6Ri"></div>
                        </div>
                        <div class="row">
                            <div class="col offset-l4 l4 offset-m4 m4 offset-s3 s6">
                                <button class="btn btn-large waves-effect waves-light blue" type="submit" name="action">
                                    Envoyer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col l12">
                <h4>Me trouver</h4>
                <div class="row">
                    <div id="gmap" class="col s12" style="height:500px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN Partie Contact -->

    <footer class="page-footer <?= $color; ?>" style="margin-top:0px;">
        <div class="footer-copyright">
            <div class="container">© 2015 Ugho STEPHAN, All rights reserved.</div>
        </div>
    </footer>
    <?php include '../layouts/footer.php'; ?>
