$(document).ready(function(){
    $('.btn_home').hide();
    checkScroll();

    var isDraggable = $(document).width() > 480 ? true : false;

    //Google Maps
    $('#gmap').gmap3({
        marker:{address:"Nantes, France", options:{icon: "img/location.png"}},
        map:{
            options:{
                zoom: 14,
                scrollwheel: false,
                draggable: isDraggable
            }
        }
    });

    //active navbar
    activeNavBar();

    //animate skills bar
    $('.skills').each(function () {
        $('.percentage').hide();
        $(this).appear(function() {
            var b = $(this).data('width');
            $(this).animate({
                width: b + "%",
                opacity: 1
            }, 1000, "easeOutCirc", function() {
                $( this ).children('.percentage').show();
            });
        });
    });

    $(window).scroll(function () {//Au scroll dans la fenetre on déclenche la fonction
        checkScroll();
    });


    $('#formulaire').submit(function( event ) {
        // Stop form from submitting normally
        event.preventDefault();

        var recaptchaResponse = $('#g-recaptcha-response').val();
        var message = $('#message').val();
        var email = $('#email').val();
        var nom = $('#last_name').val();
        var prenom = $('#first_name').val();

        $.ajax({
    		type: "POST",
    		url: "ajax.php",
            data: {"prenom" : prenom, "nom" : nom, "email" : email, "message" : message, "recaptcha" : recaptchaResponse},
    		dataType: "json",
    		success: function(data) {
    			if(data.status == 'success') {
                    setFlash(data.status, data.libelle);
                    document.getElementById("formulaire").reset();
                } else {
                    setFlash(data.status, data.libelle);
                }
    		}
    	});
    });
});

function activeNavBar() {
    $('.section').each(function () {
        unactiveItemsNavBar();
        $(this).appear(function() {
            var btn_id = "#btn_" + $(this).attr( "id");
            $(btn_id).addClass('active');
        });
    });
}

function unactiveItemsNavBar() {
    $('#navigation li').removeClass('active');
}

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
}

function setFlash(type, libelle) {
    var flash = '<div class="chip col s12 z-depth-1 ' + type + '"> ' + libelle + '<i class="material-icons">close</i></div>';

    $('#title_form').after(flash);

    $('.chip').delay(3000).fadeOut(500, function() {
        $(this).remove();
    });
}
