$(document).ready(function(){
    $('.btn_home').hide();
    checkScroll();

    //Google Maps
    $('#gmap').gmap3({
        marker:{address:"Nantes, France", options:{icon: "img/location1.png"}},
        map:{
            options:{
                zoom: 14,
                scrollwheel: false
            }
        }
    });

    //animate skills bar
    $('.skills').each(function () {
        $(this).appear(function() {
            var b = $(this).attr("data-width");
            $(this).animate({
                width: b + "%"
            }, 600, "easeOutCirc");
        });
    });

    $(window).scroll(function () {//Au scroll dans la fenetre on déclenche la fonction
        checkScroll();
    });
});

function checkScroll(){
    if ($(window).scrollTop() > 500) { //si on a défilé de plus de 550px du haut vers le bas
        $('#navigation').addClass("fixNavigation"); //on ajoute la classe "fixNavigation" à <nav id="navigation">
        $('#afterNavContainer').css('margin-top', '64px');
        $('#logo').css('opacity', '0').css('transition', 'opacity 0.5s');
        $('#logocenter').css('opacity', '1');

        // Show btn home
        $('.btn_home').show(500);

    } else {
        $('#navigation').removeClass("fixNavigation"); //sinon on retire la classe "fixNavigation" à <nav id="navigation">
        $('#logo').removeClass("brand-logo center"); //On place le logo de nouveau à gauche
        $('#afterNavContainer').css('margin-top', 'auto');
        $('#logo').css('opacity', '1');
        $('#logocenter').css('opacity', '0').css('transition', 'opacity 0.5s');

        //hide btn home
        $('.btn_home').hide(500);
    }

    /*var posCursor = $(window).scrollTop();
    var posHome = $('#home').position().top;
    var posAbout = $('#about').position().top;
    var posExperience = $('#experience').position().top;
    var posCompetence = $('#competence').position().top;
    var posContact = $('#contact').position().top;*/

    //console.log('cursor : ' + posCursor + " - home : " + posHome + " - about : " + posAbout + " - experience : " + posExperience);

    /*if (posCursor >= posHome && posCursor < posAbout) {
    disableAllNav();
} else if (posCursor >= posAbout && posCursor < posExperience) {
enableOneNav('about');
} else if (posCursor >= posExperience && posCursor < posCompetence) {
enableOneNav('experience');
} else if (posCursor >= posCompetence && posCursor < posContact) {
enableOneNav('competence');
} else if (posCursor >= posContact) {
enableOneNav('contact');
}*/
}
/*
function disableAllNav() {
$('.active').removeClass('active');
}

function enableOneNav(type) {
disableAllNav();
$('.btn_' + type).addClass('active');
console.log(type);
}*/
